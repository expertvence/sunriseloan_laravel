<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Library\Template;
use App\MemberRegistration;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

    public function memRegistration()
    {
        return Template::loadView('employee/memberRegister/register');
    }
    public function memRegistrationForm($id = "")
    {

        $data = MemberRegistration::find($id);

        return Template::loadView('employee/memberRegister/reg_create_form', ['data' => $data]);
    }

    public function EmployeememberList()
    {
        if (Auth::user() && Auth::user()->user_type === 'manager') {
            $managedMemberIds = User::where('ref_id', Auth::id())
                ->where('user_type', 'user')
                ->whereNotNull('member_id')
                ->pluck('member_id');
            $memberQuery = MemberRegistration::whereIn('id', $managedMemberIds);
        } else {
            $memberQuery = MemberRegistration::query();
        }

        $status = request()->query('status');
        if (in_array($status, ['active', 'inactive', 'rejected'], true)) {
            $memberQuery->where('status', $status);
        }

        $data = $memberQuery->orderBy('created_at', 'desc')->get();
        return Template::loadView('employee/memberRegister/member_list', ['data' => $data]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'nullable|integer|exists:members,id',
            'uid' => 'required|string|max:50',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Others',
            'age' => 'nullable|integer|min:0|max:150',
            'religion' => 'nullable|string|max:100',
            'fathers_name' => 'nullable|string|max:255',
            'mothers_name' => 'nullable|string|max:255',
            'address' => 'required|string|max:1000',
            'mobile' => 'required|string|max:30',
            'email' => 'nullable|email|max:255',
            'number_of_share' => 'nullable|numeric|min:0',
            'share_amt' => 'nullable|numeric|min:0',
            'nid' => 'nullable|string|max:50',
            'member_profession' => 'nullable|string|max:150',
            'nomini_name' => 'nullable|string|max:255',
            'nomini_relation' => 'nullable|string|max:100',
            'nomini_age' => 'nullable|integer|min:0|max:150',
            'nomini_birth_nid' => 'nullable|string|max:50',
            'nomini_adress' => 'nullable|string|max:1000',
            'member_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $authUser = Auth::user();
        if (!$authUser) {
            return response()->json(['title' => 'Error', 'msg' => 'Please sign in again.'], 401);
        }

        $id = $request->input('id');
        $member = $id ? MemberRegistration::findOrFail($id) : null;
        $email = trim((string) ($validated['email'] ?? ''));
        $generatedEmail = false;

        if ($email === '' && $member) {
            $email = (string) (User::where('member_id', $member->id)->value('email') ?: $member->email);
        }
        if ($email === '') {
            $email = $this->generateUniqueMemberEmail($validated['name']);
            $generatedEmail = true;
        }

        $duplicateEmail = User::where('email', $email)
            ->when($member, function ($query) use ($member) {
                $query->where('member_id', '!=', $member->id);
            })->exists();
        $duplicateMemberEmail = MemberRegistration::where('email', $email)
            ->when($member, function ($query) use ($member) {
                $query->where('id', '!=', $member->id);
            })->exists();

        if ($duplicateEmail || $duplicateMemberEmail) {
            return response()->json(['title' => 'Error', 'msg' => 'This email address is already used by another account.'], 422);
        }

        DB::beginTransaction();
        try {
            $data = [
                'Uid' => $validated['uid'] ?? null,
                'name' => $validated['name'],
                'gender' => $validated['gender'] ?? null,
                'age' => $validated['age'] ?? null,
                'religion' => $validated['religion'] ?? null,
                'fathers_name' => $validated['fathers_name'] ?? null,
                'mothers_name' => $validated['mothers_name'] ?? null,
                'address' => $validated['address'] ?? null,
                'mobile' => $validated['mobile'] ?? null,
                'user_type' => 'user',
                'email' => $email,
                'no_of_share' => $validated['number_of_share'] ?? null,
                'share_amount' => $validated['share_amt'] ?? null,
                'nid' => $validated['nid'] ?? null,
                'member_profession' => $validated['member_profession'] ?? null,
                'nomini_name' => $validated['nomini_name'] ?? null,
                'nomini_relation' => $validated['nomini_relation'] ?? null,
                'nomini_age' => $validated['nomini_age'] ?? null,
                'nomini_barth_or_ind' => $validated['nomini_birth_nid'] ?? null,
                'nomini_address' => $validated['nomini_adress'] ?? null,
                'status' => $member ? $member->status : 'inactive',
                'created_by' => $member ? $member->created_by : $authUser->name,
                'updated_at' => now(),
            ];

            if ($request->hasFile('member_image')) {
                $image = $request->file('member_image');
                $fileName = now()->format('YmdHis') . '_' . \Illuminate\Support\Str::random(8) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('images/member_images');
                if (!is_dir($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $image->move($destinationPath, $fileName);
                $data['member_photo'] = $fileName;
            }

            if ($member) {
                MemberRegistration::where('id', $member->id)->update($data);
                User::where('member_id', $member->id)->update([
                    'name' => $validated['name'],
                    'email' => $email,
                    'update_ref_id' => $authUser->id,
                    'updated_by' => $authUser->name,
                    'updated_at' => now(),
                ]);
                $message = 'Member updated successfully.';
            } else {
                $data['created_at'] = now();
                $memberId = MemberRegistration::insertGetId($data);
                $nameParts = preg_split('/\s+/', trim($validated['name']));
                $firstLetter = strtolower(substr($nameParts[0] ?? 'm', 0, 1));
                $lastName = strtolower($nameParts[1] ?? '');
                $emailPrefix = strtolower(explode('@', $email)[0]);
                $baseUserName = "@{$firstLetter}{$lastName}_{$emailPrefix}_sunriseloan";
                $userName = $baseUserName;
                $counter = 1;
                while (User::where('user_name', $userName)->exists()) {
                    $userName = $baseUserName . $counter++;
                }

                User::create([
                    'name' => $validated['name'],
                    'email' => $email,
                    'ref_id' => $authUser->id,
                    'user_name' => $userName,
                    'user_type' => 'user',
                    'member_id' => $memberId,
                    'password' => Hash::make('12345678'),
                    'created_by' => $authUser->name,
                    'updated_by' => $authUser->name,
                    'status' => 'active',
                    'created_at' => now(),
                ]);
                $message = 'Member created successfully.';
            }

            DB::commit();
            if ($generatedEmail) {
                $message .= ' Generated login email: ' . $email;
            }
            return response()->json(['title' => 'Success', 'msg' => $message, 'generated_email' => $generatedEmail ? $email : null]);
        } catch (\Throwable $e) {
            DB::rollBack();
            report($e);
            return response()->json(['title' => 'Error', 'msg' => 'The member could not be saved. Please try again.'], 500);
        }
    }

    private function generateUniqueMemberEmail($name)
    {
        $nameSlug = \Illuminate\Support\Str::slug((string) $name, '.');
        $nameSlug = $nameSlug !== '' ? $nameSlug : 'member';
        $sequence = 1;

        do {
            $email = $nameSlug . '.' . $sequence . '@gmail.com';
            $userExists = User::where('email', $email)->exists();
            $memberExists = MemberRegistration::where('email', $email)->exists();
            $sequence++;
        } while ($userExists || $memberExists);

        return $email;
    }
    // public function show($id)
    // {
    //     $user = DB::table('members')
    //         ->leftJoin('users', 'users.member_id', '=', 'members.id')
    //         ->where('members.id', $id)
    //         ->where('users.member_id', $id)
    //         ->first();

    //     // dd($user);

    //     return Template::loadView('employee/memberRegister/member_show', compact('user'));
    // }

    public function show($id)
    {
        $user = DB::table('members')
            ->leftJoin('users', 'users.member_id', '=', 'members.id')
            ->where('members.id', $id)
            ->select(
                'members.*',
                'users.id as user_id',
                'users.name as user_name',
                'users.email',
                // 'users.is_publish',
                'users.created_at as user_created_at'
            )
            ->first();

        return Template::loadView('employee/memberRegister/member_show', compact('user'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Enums\CountryCode;
use App\Models\Leader;
use App\Models\OfflineAccount;
use App\Models\Program;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\App;

class DonationController extends Controller
{

    /**
     * Display the donation form.
     */
    public function index()
    {
        $countries = CountryCode::all();
        $programs = Program::all();
        return view('donation', compact('countries',  'programs'));  // Make sure this matches the Blade view you created
    }

    public function offlineDonation()
    {

        $offlineAccounts = OfflineAccount::all();
        return view('offline_donation', compact('offlineAccounts'));  // Make sure this matches the Blade view you created
    }
    /**
     * Handle the donation form submission.
     */
    public function store(Request $request)
    {
        App::setLocale('ar');
        // Determine if the donor is a company
        $isCompany = $request->input('donor_type') === 'on';

        // Common validation rules
        $rules = [
            'program' => 'required|exists:programs,id',
            'email' => 'required|email',
            'phone' => 'required|regex:/^\+?\d{7,13}$/',
            'country' => 'required',
            'currency' => 'required|in:USD,ILS,EUR,JOD',
            'amount' => 'required|numeric|min:1',
            'number_orphans' => 'required|numeric|min:1',
            'payment_method' => 'required|in:Online,Offline',
        ];

        // Add conditional rules for individual or company donors
        if ($isCompany) {
            $rules['company_name'] = 'required|string|max:255';
        } else {
            $rules['first_name'] = 'required|string|max:255';
            $rules['family_name'] = 'required|string|max:255';
        }

        // Custom error messages
        $messages = [
            'program.required' => 'البرنامج هو حقل مطلوب',
            'program.exists' => 'البرنامج المختار غير موجود',
            'email.required' => 'البريد الإلكتروني هو حقل مطلوب',
            'email.email' => 'البريد الإلكتروني يجب أن يكون عنوان بريد إلكتروني صالحًا',
            'phone.required' => 'الهاتف هو حقل مطلوب',
            'phone.regex' => 'الهاتف يجب أن يكون رقمًا صالحًا',
            'country.required' => 'البلد هو حقل مطلوب',
            'currency.required' => 'العملة هي حقل مطلوب',
            'currency.in' => 'العملة يجب أن تكون واحدة من: USD, ILS, EUR, JOD',
            'amount.required' => 'المبلغ هو حقل مطلوب',
            'amount.numeric' => 'المبلغ يجب أن يكون رقمًا',
            'number_orphans.required' => 'عدد الأيتام هو حقل مطلوب',
            'number_orphans.min' => 'عدد الأيتام يجب أن يكون على الأقل 1',
            'payment_method.required' => 'طريقة الدفع هي حقل مطلوب',
            'payment_method.in' => 'طريقة الدفع يجب أن تكون Online أو Offline',
            'first_name.required' => 'الاسم الأول هو حقل مطلوب',
            'first_name.max' => 'الاسم الأول يجب أن لا يتجاوز 255 حرفًا',
            'family_name.required' => 'اسم العائلة هو حقل مطلوب',
            'family_name.max' => 'اسم العائلة يجب أن لا يتجاوز 255 حرفًا',
            'company_name.required' => 'اسم الشركة هو حقل مطلوب',
            'company_name.max' => 'اسم الشركة يجب أن لا يتجاوز 255 حرفًا',
        ];

        // Perform validation
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // Get all error messages and join them into one string
            $errorMessages = implode('<br>', $validator->errors()->all());
            flash()
                ->option('position', 'top-center')
                ->translate(['language' => 'ar'])
                ->option('timeout', 10000)->error($errorMessages, [], "خطأ!");
            return back()->withInput();
        }

        // Store donation data
        Leader::create([
            'program_id' => $request->program,
            'first_name' => $isCompany ? '-' : $request->first_name,
            'family_name' => $isCompany ? '-' : $request->family_name,
            'company_name' => $isCompany ? $request->company_name : '-',
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'currency' => $request->currency,
            'amount' => $request->amount,
            'number_orphans' => $request->number_orphans,
            'payment_method' => $request->payment_method,
            'is_private' => $request->boolean('is_private'),
            'donor_type' => $isCompany,  // Using boolean value directly
        ]);

        flash()
        ->option('position', 'top-center')
        ->translate(['language' => 'ar'])
        ->option('timeout', 10000)->success("شكرًا لتبرعك الكريم!", [], "رائع!");

        // Handle program redirection based on payment method
        $program = Program::find($request->program);

        $paymentMethod = strtolower($request->payment_method);
        $payLink = $program->pay_link;

        if ($paymentMethod == 'online') {
            if (!empty($payLink) && $payLink != 'null' && $payLink != '0') {
                // dd(!empty($payLink) && $payLink != 'null' && $payLink != '0');
                return redirect($payLink);
            }

            // For cases where pay_link is empty or invalid
            $offlineAccounts = OfflineAccount::where('program_id', $request->program)->get();
            return view('offline_donation', compact('offlineAccounts'));
        } elseif ($paymentMethod == 'offline') {
            // No need to repeat this query for 'offline' method
            $offlineAccounts = OfflineAccount::where('program_id', $request->program)->get();
            return view('offline_donation', compact('offlineAccounts'));
        }
    }


    public function about()
    {
        return view(view: 'pages.about');
    }
    public function projects()
    {
        return view(view: 'pages.projects');
    }

    public function reports()
    {
        $leadersCount = Leader::count();
        $donationAmount = Leader::all()->sum(callback: 'amount');
        return view('pages.reports', compact('leadersCount', 'donationAmount'));
    }
}

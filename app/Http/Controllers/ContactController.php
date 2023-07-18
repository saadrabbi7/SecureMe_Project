<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\QueryException;

class ContactController extends Controller
{
    public function sendMail(Request $request)
    {
        try{
            $mailData = [
                'name' => $request->name,
                'email' =>$request->email,
                'message' => $request->message,
            ];
            Mail::to('prabirchy5439@gmail.com')->send(new ContactMail($mailData));

            Contact::create($mailData);
            
            return redirect()->back()->with('success', 'Email has been Send ');
        }catch (QueryException $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }

        
    }
    public function index()
    {
        $data = Contact::orderBy('id', 'desc')->get();
        return view('backend.contacts.index', compact('data'));
    }
    public function store(Request $request)
    {
        try {
            Contact::create([
                'name' => $request->name ?? null,
                'email' => $request->email ?? null,
                'message' => $request->message ?? null,
            ]);

            return redirect()->back()->with('alert', 'Saved Successfully');

        } catch (Exception $th) {
            return redirect()->back()->with('alert', $th->getMessage());
        }
    }
    public function destroy($id)
    {
        $data = Contact::where('id', $id)->first();
        $data->delete();
        return redirect()->back()->with('alert', 'Deleted Successfull');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::latest('created_at')->first();
        if ($contact) {
            $data['contact']    = $contact;
            $data['title']      = "Contact View";
            $data['page']       = "Contact";
            return view('admin.contact.view',$data);
        } else {
            return redirect()->route('contact.create');
        }       
    }

    public function createOrEdit($id = null)
    {
        $contact = $id ? Contact::findOrFail($id) : new Contact();
        $data['title'] = $id ? "Edit Contact" : "Create Contact";
        $data['contact'] = $contact;
        $data['page']   = "Contact";
        return view('admin.contact.create', $data);
    }

    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'addresses' => 'nullable|array',
            'phones'    => 'required|array',
            'locations' => 'nullable|string|max:1000',
            'email'     => 'required|string|max:500',
            'facebook'  => 'nullable|string|max:500',
            'instagram' => 'nullable|string|max:500',
            'youtube'   => 'nullable|string|max:500',
            'x'         => 'nullable|string|max:500',
        ]);

        $isNew  = empty($request->id);

        $data = array_merge($validated, [
            'phones'    => json_encode($validated['phones']),
            'addresses' => json_encode($validated['addresses'] ?? []),
        ]);

        $contact = Contact::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        if ($contact) {
            return redirect()->route('contact.show', $contact->id)
                ->with('success', $isNew ? 'Contact created successfully.' : 'Contact updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update contact details.');
        }
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        $data['contact']    = $contact;
        $data['title']      = "Contact View";
        $data['page']       = "Contact";
        return view('admin.contact.view',$data);      
    }
    public function destroy($id=null)
    {
        // Find the model instance by ID
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Record deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderView() {
        $contact = Contact::first();
        return view('web.public.pages.order.layout', ['contact' => $contact]);
    }
}

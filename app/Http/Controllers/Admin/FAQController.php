<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    public function index() {

        $faq = FAQ::orderBy('id','desc')->get();
        $count = sizeof($faq);

        return view('admin.FAQ.list',compact('faq','count'));
    }

    public function addUpdateFAQ(Request $request ,$id=false) {

        $faq = new FAQ();

        if($id) {
            $faq = FAQ::where('id','=',$id)->firstOrFail();
        }
        return view('admin.FAQ.addUpdateFAQ',compact('faq'));
    }

    public function saveFAQ(Request $request) {

        $id = $request->get('id');
        $faq = FAQ::find($id);

        $messages = [

            'question.required' => 'Question is Required.',
            'answer.required' => 'Answer is Required.',
        ];
        
        $this->Validate($request,[
            'question' => 'required',
            'answer' => 'required'
        ],$messages);

        if(empty($faq)) {

            FAQ::create([

                'question' => $request->question,
                'answer' => $request->answer,
            ]);

            session()->flash('type','message');
            session()->flash('message', 'FAQ Added Successfully.');
    
            return redirect('admin/faqs');
        }
        else { 

            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->save();

            session()->flash('type','message');
            session()->flash('message', 'FAQ Updated Successfully.');

            return redirect('admin/faqs');
        }
    }

    public function viewFAQ($id) {

        $faq = FAQ::where('id','=',$id)->first();
        return view('admin.FAQ.details',compact('faq'));
    }

    public function deleteFAQ($id) {

        FAQ::destroy($id);

        session()->flash('type','message');
        session()->flash('message', 'FAQ Deleted Successfully.');

        return redirect('admin/faqs');
    }
}
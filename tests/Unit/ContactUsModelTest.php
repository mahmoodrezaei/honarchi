<?php

namespace Tests\Unit;

use App\ContactUs;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactUsModelTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    //tested create
    public function testCreate()
    {
//        $contactUs = new ContactUs;
//
//        $contactUs->title = 'با ما در تماس باشید';
//        $contactUs->address = 'خراسان جنوبی، بیرجند، سجاد شهر، خیابان سلمان فارسی، نبش سلمان فارسی ۴، پلاک ۴۶';
//        $contactUs->phone = '۰۵۶۳۲۴۳۹۱۲۴';
//        $contactUs->cell_phone = '۰۹۹۱۱۷۳۶۰۳۶';
//        $contactUs->email = 'info [at] honarchi [dot] com';
//        $contactUs->instagram = '@honarchi_com';
//        $contactUs->telegram = '@honarchi_com';
//
//        $contactUs->save();
//
//        dd($contactUs);

    }

    //TESTED OF UPDATE
    public function testUpdate()
    {
//        $contactUs = ContactUs::find(2);
//
//        $contactUs->title = 'a';
//        $contactUs->address = 'b';
//        $contactUs->phone = 'c';
//        $contactUs->cell_phone = 'd';
//        $contactUs->email = 'e';
//        $contactUs->instagram = 'f';
//        $contactUs->telegram = 'h';
//
//        $contactUs->save();
//
//        dd($contactUs);
    }

    //TESTED OF DESTROY
    public function testDelete()
    {
//        $contactUs=ContactUs::find(1)->delete();
//          dd($contactUs);
    }
}

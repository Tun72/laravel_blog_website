<x-layout>
    {{-- <section class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="./logo.png" alt="" width="250" />
        <h1 class="display-5 fw-bold">Creative Coder Myanmar</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4 lh-lg mt-4">
                Creative Coder ဆိုတာကတော့ Programming Language နဲ့ပက်သက်
                ပြီးလမ်းပျောက်နေတဲ့ လူငယ်တွေ ၊ Web development လောကထဲ စတင်
                ဝင်ချင်သူတွေအတွက် အခမဲ့အတန်းလေးများရော | fees ဖြင့် အတန်းများရော
                Online Course လေးတွေဖွင့်ပေးကာသင်ပေးသော
                ကျောင်းလေးပဲဖြစ်ပါတယ်ခင်ဗျ။နေ့စဉ်နှင့်အပတ်စဉ်လဲ လေ့လာသူတို့ ဗဟုသုတ
                တိုးအောင် Tricks & blogs များအစဉ်မပြတ်တင်ပေးသော ကျောင်းလေးဖြစ်ပါတယ်။
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="#subscribe" type="button" class="btn btn-primary btn-lg px-4 gap-3">
                    Subscribe Now
                </a>
                <a type="button" class="btn btn-outline-secondary btn-lg px-4" href="#blogs">
                    Read Blogs
                </a>
            </div>
        </div>
    </section> --}}

    <section class="container text-center mt-5 mb-4" id="blogs">
        <h1 class="display-5 fw-bold mb-4"><span class="text-primary">Blogs</span> & Trips</h1>
        
        <div class="mb-4">
            <select name="" id="" class="p-1 rounded-pill">
                <option value="">Filter by Category</option>
            </select>
            <select name="" id="" class="p-1 rounded-pill mx-3">
                <option value="">Filter by Tag</option>
            </select>
        </div>
        <form action="" class="my-3 mb-5 col-7 mx-auto">
            <div class="input-group mb-3">
                <input type="text" autocomplete="false" class="form-control" placeholder="Search Blogs..." />
                <button class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
                    Search
                </button>
            </div>
        </form>
        
        <x-blogs :blogs="$blogs" />
        
    </section>


</x-layout>
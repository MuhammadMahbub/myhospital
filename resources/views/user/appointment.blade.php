<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

        <form class="main-form" action="{{ route('appointment') }}" method="POST">
            @csrf
            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" name="patient_name" class="form-control" placeholder="Full name">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="text" name="email" class="form-control" placeholder="Email address..">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="" id="jspecialty" class="custom-select">
                        <option value>General Specialty</option>
                        @php
                            $specials = App\Models\Special::all();
                        @endphp
                        @foreach ($specials as $special)
                            <option value="{{ $special->specialty }}">{{ $special->specialty }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="doctor_name" id="jdoctor" class="custom-select">
                        <option value>General Doctor</option>
                        {{-- <option value=""></option> --}}
                    </select>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="date" name="date" class="form-control">
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <input name="phone" type="text" class="form-control" placeholder="Phone Number..">
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('#jspecialty').change(function() {
            let jsp = jQuery(this).val()
            jQuery.ajax({
                url: '/getdoctor',
                type: 'post',
                data: 'jsp=' + jsp + '&_token={{ csrf_token() }}',
                success: function(result) {
                    jQuery('#jdoctor').html(result)
                }
            })
        })
    })
</script>

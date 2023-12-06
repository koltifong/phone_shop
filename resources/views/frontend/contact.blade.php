@extends('layout.frontend')
@section('content')
<style>
body {
  background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF);
}

.bg-image {
  background-image: url('https://suggestionox.com/assets/images/contact.png');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
</style>

<div class="container-fluid px-5 my-5">
  <div class="row justify-content-center">
    <div class="col-xl-10">
      <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
        <div class="card-body p-0">
          <div class="row g-0">
            <div class="col-sm-6 d-none d-sm-block bg-image"></div>
            <div class="col-sm-6 p-4">
              <div class="text-center">
                <div class="h3 fw-light">Contact Form</div>
                <p class="mb-4 text-muted">Please feel free to contact us.</p>
              </div>

              <!-- * * * * * * * * * * * * * *
          // * * SB Forms Contact Form * *
          // * * * * * * * * * * * * * * *

          // This form is pre-integrated with SB Forms.
          // To make this form functional, sign up at
          // https://startbootstrap.com/solution/contact-forms
          // to get an API token!
          -->

              <!-- <form action="{{ route('contact.post') }}" method="POST"> -->
              <!-- @csrf -->
                <!-- Name Input -->
                <!-- <div class="form-floating mb-3">
                  <input class="form-control" type="text" placeholder="Name" require/>
                  @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                  <label for="name">Name</label> -->
                  <!-- <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div> -->
                <!-- </div> -->

                <!-- Email Input -->
                <!-- <div class="form-floating mb-3">
                  <input class="form-control" type="email" placeholder="Email Address" require />
                  @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif -->
                  <!-- <label for="emailAddress">Email Address</label> -->
                  <!-- <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div> -->
                  <!-- <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div> -->
                <!-- </div> -->
            <form action="{{ route('contact.post') }}" method="POST">
              @csrf
              <!-- 2 column grid layout with text inputs for the first and last names -->  
              <div class="form-outline mb-4">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" id="name" class="form-control" name="name" required autofocus>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
              </div>
              
              <!-- Email input -->
              <div class="form-outline mb-4">
              <label for="email_address" class="form-label">Email address</label>
                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                  @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
              </div>

                <!-- Message Input -->
                <div class="form-outline mb-4">
                <label for="message" class="form-label">Message</label>
                  <textarea class="form-control" id="message" name="message" type="text" placeholder="Message" style="height: 10rem;" require autofocus></textarea>
                  @if ($errors->has('message'))
                        <span class="text-danger">{{ $errors->first('message') }}</span>
                    @endif
                </div>

                <!-- Submit success message -->
                <!-- <div class="d-none" id="submitSuccessMessage">
                  <div class="text-center mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    <p>To activate this form, sign up at</p>
                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                  </div>
                </div> -->

                <!-- Submit error message -->
                <!-- <div class="d-none" id="submitErrorMessage">
                  <div class="text-center text-danger mb-3">Error sending message!</div>
                </div> -->

                <!-- Submit button -->
                <div class="d-grid">
                  <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                </div>
              </form>
              <!-- End of contact form -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- CDN Link to SB Forms Scripts -->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
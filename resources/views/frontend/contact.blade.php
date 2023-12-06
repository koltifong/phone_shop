@extends('layout.frontend')
@section('content')
<style>
body {
  background: #007bff;
  background: linear-gradient(to right, #0062E6, #33AEFF);
}
</style>
<div class="container-fluid px-5 my-5">
  <div class="row justify-content-center">
    <div class="col-xl-10">
      <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
        <div class="card-body p-0">
          <div class="row g-0">
            <div class="col-sm-6 d-none d-sm-block">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62003.244480551315!2d100.47498993530762!3d13.766641643148127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e29f08afd904d5%3A0xf4afd178486b54e!2sApple%20Store%20Central%20World!5e0!3m2!1sen!2skh!4v1701848188513!5m2!1sen!2skh" width="750" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-sm-6 p-4">
              <div class="text-center">
                <div class="h3 fw-light">Contact Form</div>
                <p class="mb-4 text-muted">Please feel free to contact us.</p>
              </div>
            <form action="{{ route('contact.store') }}"  method="post" >
              @csrf
              <!-- 2 column grid layout with text inputs for the first and last names -->  
              <div class="form-outline mb-4">
              <label>Name</label>
              <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">
              <!-- Error -->
              @if ($errors->has('name'))
              <div class="error">
                  {{ $errors->first('name') }}
              </div>
              @endif
              </div>
              <!-- Email input -->
              <div class="form-outline mb-4">
              <label>Email</label>
              <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">
              @if ($errors->has('email'))
              <div class="error">
                  {{ $errors->first('email') }}
              </div>
              @endif
              </div>
              <!-- Message Input -->
              <div class="form-outline mb-4">
              <label>Message</label>
              <textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
                  rows="4"></textarea>
              @if ($errors->has('message'))
              <div class="error">
                  {{ $errors->first('message') }}
              </div>
              @endif
              </div>
              <!-- Submit button -->
              <div class="d-grid">
                <!-- <button class="btn btn-primary btn-lg" type="submit">Submit</button> -->
                <input type="submit" name="send" value="Submit" class="btn btn-primary btn-lg">
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
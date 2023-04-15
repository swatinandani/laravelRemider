@extends('layouts.app')
@section('content')
   
    <section class="section" id="contact">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-8 col-lg-6">
                   
                    <!-- Heading -->
                    <h2 class="section-title mb-2 ">
                       Create <span class="font-weight-normal">Reminder</span>
                    </h2>

                    <!-- Subheading -->
                  

                </div>
            </div> <!-- / .row -->

            <div class="row">
                <div class="col-lg-6">
                   <!-- form message -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div>
                        </div>
                    </div>
                    <!-- end message -->
                    <!-- Contacts Form -->
                    @if(session('status'))
                    <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('reminders.store') }}" method="POST" name="add_post">
                        {{ csrf_field() }}
                 
                        <div class="row">
                            <!-- Input -->
                            <div class="col-sm-6 mb-6">
                                <div class="form-group">
                                    <label class="h6 small d-block text-uppercase">
                                        Title
                                        <span class="text-danger">*</span>
                                    </label>

                                    <div class="input-group">
                                        <input class="form-control" name="title" id="title" required="" placeholder="John Doe" type="text">
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                    <label class="h6 small d-block text-uppercase">
                                        Date & Time of Reminder
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="datetime-local" class="form-control" id="datetime" name="datetime">
                                       
                                    </div>
                                    @error('title')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror


                                   
                                </div>
                            </div>
                            <!-- End Input -->

                         <div class="w-100"></div>

                        

                        </div>

                        <!-- Input -->
                        <div class="form-group mb-5">
                            <label class="h6 small d-block text-uppercase">
                                Description
                                <span class="text-danger">*</span>
                            </label>

                            <div class="input-group">
                                <textarea class="form-control" rows="4" name="description" id="description" required="" placeholder="Hi there, I would like to ..."></textarea>
                            </div>
                            @error('description')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- End Input -->

                        <div class="">
                           <input name="submit" type="submit" class="btn btn-primary btn-circled" value="Send Message">
                           
                            <p class="small pt-3">We'll get back to you in 1-2 business days.</p>
                        </div>
                    </form>
                    <!-- End Contacts Form -->
                </div>

          
            </div>
        </div>
    </section>
 @endsection
   
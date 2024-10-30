@extends('front.app.template')

@section('content')
        
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4 animated slideInDown">Not Found </h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">Sorry, the page you are looking for could not be found.</li>
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="btn btn-primary">Go Back to Home</a></li>

                     </ol>
                </nav>
            </div>
        </div>  
 
  


    
@endsection

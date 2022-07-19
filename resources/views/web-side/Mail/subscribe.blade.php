
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Welcome!</div>
                          <div class="card-body">
                              <h5>Subscriber</h5>
                              <h5>Thanks for your Subscription</h5>
                           @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                   {{ __('A fresh mail has been sent to your email address.') }}
                               </div>
                           @endif
                       </div>
                   </div>
               </div>
           </div>
       </div>

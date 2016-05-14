<div class="container">
     <div class="row">
        <div class="col-lg-5 col-lg-offset-1">
             <h1>Sign-Up<small></small></h1>
                <form action="#" method="post" > 
                <div class="form-group">
                    <div class="col-xs-4">
                        <label  class="sr-only" for="email">Email address</label>
                        <div class="input-group">
                            <div class="input-group-addon">@</div>
                            <input type="text" class="form-control" id="email" placeholder="Email"
                                   name="email" value="<?php echo $email; ?>">  <br/>             
                        </div>
                    </div>
                </div>      
                <div class="form-group">
                    <div class="col-xs-4">
                        <label class="sr-only" for="password">Password</label>   
                        <div class="input-group">                  
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                   name="password" value="">  <br/>
                        </div>
                    </div>
                </div>
                <input type="submit" value="submit" class="btn btn-primary" />

            </form>
        </div>
    </div>
</div>

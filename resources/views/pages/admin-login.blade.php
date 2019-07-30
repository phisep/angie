<div class="container">
        <section id="login-form">
            <!--<h1>Robotic <span>Lab</span></h1> -->
            <form role="form" method="post" action="{{ url('/admin/login') }}" name="form">
                <div class="form-group">
                    <div class="input-group login-input">
                        <span class="input-group-addon"><i class="icon-user"></i></span>
                        <input type="text" name="user" class="form-control" placeholder="Usuario" required>
                    </div>
                    <div class="input-group login-input">
                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Iniciar sesión</button>
                </div>
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </section>
    </div>
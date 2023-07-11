@include('layouts.header')
         <!-- Styles -->
        <style>
      *{
            margin:0;
            padding:0;
            list-style-type:none;
            text-decoration:none;

        }
    body{
			  height:100%;
             display:grid;
             grid-template-rows:min-content, 1fr;
             grid-template-columns:1fr;
             background:rgb(240,242,245);
			
			
       }
    main{
            height:100vh;
            width:100%;
            background:rgb(240,242,245);
           
        }
	section{
        padding:2em;
    }
	

    nav {
            background:#3B82F6;
            
        }
    nav ul{
            display:flex;
            align-items: baseline;
            justify-content:space-around;
            color:white;
           
         }
    nav ul li:nth-child(1){
        padding-left:2em;
    }
   
 
 .fa-solid{
            color:white;
         }
    .logo_text{
         color:orange;
         font-weight:bold;
    }
    .length{
            display:none;;
        }
    a{
        color:white;
        font-size:1.2em;
        font-weight:bold;
       
    }
    a:hover{
        color:orange;
        text-decoration:none;
    }
    /**login and registration form area */
    #wrapper{
    background:white;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    padding:1em;
    }
    h4{
        text-align:center;
        margin:1em
    }
   form span{
    display:block;
    padding-bottom:3px
   }
   #login{
            padding:2em;
        }
    @media (min-width:900px)  {
        .length{
            display:block;
            flex-grow:1;
        }
        nav ul li{
            margin-right:2em;
           
        }
        #login{
            padding:3em;
        }
    }
   
        </style>
    </head>
    <body>
        
        <main>
            <nav>
                
                    <ul>
                        <li>
                            <img src="{{asset('images/logo.png')}}"  width="75" height="75"/>
                            <span id="logo_text1" class="logo_text">UserBoard</span>
                        </li>
                        
                      
                        <li class="length"></li>
                        @guest
                            @if (Route::is('showregister'))
                            <li>
                               <a href="{{ route('showlogin') }}">{{ __('login') }}</a>
                            </li>
                            @else
                            <li>
                               <a  href="{{ route('showregister') }}">
                                {{ __('Register') }}
                                
                               </a>
                            </li>
                            @endif
                        @else
                        <li>
                               
                                    Hi {{ Auth::user()->name }}
                                

                                
                            </li>
							 <li class="nav-item dropdown">
                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                               
                            </li>
                        @endguest
                        <!--<li><i class="fa-solid fa-sign-in mobile"></i>Login</li>
                        <li><i class="fa-solid fa-sign-out mobile"></i>Log Out</li>
                        <li><i class="fa-solid fa-registered mobile"></i>Register</li>
                        <li><i class="fa-solid fa-user mobile"></i></li>-->
                    </ul>
               
            </nav>
            <section>
                    
                @yield('content')
            
            </section>
        </main>
    </body>
    

</html>

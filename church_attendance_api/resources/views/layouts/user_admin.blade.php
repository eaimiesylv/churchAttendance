
@include('layouts.header')
        <!-- Styles -->
        <style>
      *{
            margin:0;
            padding:0;
            list-style-type:none;
    

        }
       
    a {
        text-decoration:none !important;
    }
    body{
			  height:100%;
             display:grid;
             grid-template-rows:min-content, 1fr;
             grid-template-columns:1fr;
             background:rgb(240,242,245);
			position:relative;
			
       }
    main{
            height:100vh;
            width:100%;
            background:rgb(240,242,245);
        }
	section{
        padding:1em;
        background:blue;
		
		
    }
	aside{
            position:absolute;
            background:white;
            min-height:100vh;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            width:auto;
            left:0px;
            z-index:2;
            padding:0em 2em;
            display:none;
            
         }
    aside li{
            padding-top:1.3em;
        }
    aside  .fa-solid{
            color:blue;
         }
   aside span{
            padding-left:0.5em;
        }

    nav {
            background:#3B82F6;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    nav ul{
            display:flex;
            align-items: baseline;
            justify-content:space-around
         }
    nav ul li:nth-child(1){

       
        margin-left:-3em !important;
    }
    nav ul li:nth-child(2){

   
    margin-left:-6em !important;
}
 .fa-solid{
            color:white;
         }
    .logo_text{
         color:orange;
         font-weight:bold;
    }
    /* Mobile and Desktop settings */
    .iconCenter{
        text-align:center;
       
    }
   .hid, .length, nav  li:nth-child(3), #logo_text2{
           display:none;
         }   
    #mobile_bar, .show{
            display:block;
        }
      
    
    @media (min-width:900px)  {
        body{
            height:100%;
            display:grid;
            grid-template-rows:1fr;
            grid-template-columns:auto 1fr;
            background:rgb(240,242,245);
        }
       /* main {
            width: calc(100% - min-content);
        }*/
        aside {
            display:block;
            padding:0em 2em;
            background:white;
            position:static;
            width:auto;
        }
        #logo_large{
            visibility:hidden;
            width:20px;
            overflow:hidden;
        }
        nav  li:nth-child(3){
           display:block;
         } 
         nav ul li:nth-child(2){

   
            margin-left:1em !important;
        }  
        #mobile_bar{
            display:none;
        }
        .length{
             display:block;
             flex-grow:1
        }
        nav ul li{
            margin-right:2em;
            
         }
         #logo_text2{
            display:block;
         }
        
    }
        </style>
    </head>
    <body>
        <aside id="sidebar">
                    <ul>
                        <li>
                            <img src="{{asset('images/logo.png')}}"  width="75" height="75"/>
                            <span id="logo_text1" class="logo_text">UserBoard</span>
                        </li>
                            <!---General Leader ---->
                            @cannot('is_admin')
                                <li><a href=""><i class="fa-solid fa-dashboard mobile"></i> <span> WSF</span></a></li>
                                <li><a href=""><i class="fa-solid fa-dashboard mobile"></i> <span>Service Unit</span></a></li>
                                <!--<li><a href=""><i class="fa-solid fa-upload"></i> <span>Department</span></a></li>
                                <li><a href=""><i class="fa-solid fa-upload"></i> <span> Cell</span></a></li>-->
                                <li><a href=""><i class="fa-solid fa-upload"></i> <span> Attendance</span></a></li>
                                <li><a href=""><i class="fa-solid fa-upload"></i> <span> Notification</span></a></li>
                            @endCan
                            <!--Admin User --->
                            @can('is_admin')
                                <li><a href="/dash"><i class="fa-solid fa-dashboard mobile"></i> <span> LFC AJOWA</span></a></li>
                                <li><a href="/dash"><i class="fa-solid fa-dashboard mobile"></i> <span> Attendance Record</span></a></li>
                                <li><a href="/department"><i class="fa-solid fa-plus"></i> <span>Service Units</span></a></li>
                                <li><a href="/archive"><i class="fa-solid fa-upload"></i> <span> Create Archive</span></a></li>
                                <li><a href=""><i class="fa-solid fa-upload"></i> <span> Cell</span></a></li>
                                <li><a href=""><i class="fa-solid fa-upload"></i> <span> Zone</span></a></li>
                                <li><a href=""><i class="fa-solid fa-upload"></i> <span> District</span></a></li>
                                <li><a href=""><i class="fa-solid fa-upload"></i> <span> Allocate Leadership</span></a></li>
                                <li><a href="/new_admin"><i class="fa-solid fa-user"></i> <span> Create Admin</span></a></li>
                          @endCan
                            
                            
                    
                        <li>
							 <a class="desktop-li" href="{{ route('logout') }}" onclick="submit()">
							<i class="fa-solid fa-sign-out" onclick="submit()"></i> <span> {{ __('Logout') }}</span></a>
							<form id="logout-form" action="{{ route('logout') }}"
                               method="POST" class="d-none">@csrf
                            </form>
						</li>
                        
                       
                    </ul>
              
        </aside>
        <main>
            <nav>
                
                    <ul>
                        <li id="logo_large">
                            <img src="{{asset('images/logo.png')}}"  width="55" height="55"/>
                            <span id="logo_text2" class="logo_text">UserBoard</span>
                        </li>
                        
                        <li><i class="fa-solid fa-bars mobile" id="mobile_bar"></i></li>
                        <li><i class="fa-solid fa-bars mobile" id="desktop_bar"></i></li>
                        <li  class="length"></li>
                        <li><i class="fa-solid fa-search mobile"></i></li>
                        <li><img src="{{ asset('passport/'.$userImage) }}" alt="User Image" class="rounded" width="70" height="70"></li>

                        <!--<li><i class="fa-solid fa-user mobile"></i></li>-->
                    </ul>
               
            </nav>
            <section class="row">
                 <div class="col-md-12" style="background:white;padding:1em" >   
                    @yield('content')
                </div>
            </section>
            
        </main>
    </body>
    <script>
    $(document).ready(function() {
        //$("#sidebar").addClass("hid");

    // Toggle the sidebar when the fa-bars icon is clicked for desktp

    $("#desktop_bar").click(function(e) {
        e.stopPropagation();
        $("aside span").toggleClass("hid");
        $("aside").toggleClass("iconCenter");
    });

    $("#mobile_bar").click(function(e) {
        
        e.stopPropagation();
        $("aside").toggleClass("show");
       
    });

    // Hide the sidebar when the main element is clicked outside of the sidebar
   

/***********************************For Small screen */
$("main").click(function(e) {
    if ($("#sidebar").css("display") == "block" && !$(e.target).closest("#sidebar").length && $("aside").hasClass("show")) {
        $("aside").removeClass("show");
       
    }
});










});

function submit(){
			event.preventDefault(); document.getElementById('logout-form').submit();
		 }
///Small screen code
</script>

</html>

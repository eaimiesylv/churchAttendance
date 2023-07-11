<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
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
			position:relative;
			
       }
    main{
            height:100vh;
            width:100%;
            background:rgb(240,242,245);
        }
	section{
        padding:2em;
    }
	aside{
            position:absolute;
            background:white;
            height:100%;
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
        }
    nav ul{
            display:flex;
            align-items: baseline;
            justify-content:space-around
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
   .hid, .length, nav  li:nth-child(3){
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
                        <li><i class="fa-solid fa-dashboard mobile"></i> <span> Dashboard</span></li>
                        <li><i class="fa-solid fa-plus"></i> <span>  Create Department</span></li>
                        <li><i class="fa-solid fa-upload"></i> <span> Create Archive</span></li>
                        <li><i class="fa-solid fa-user"></i> <span> Create Admin</span></li>
                        <li><i class="fa-solid fa-upload"></i> <span> Upload Document</span></li>
                       
                    </ul>
              
        </aside>
        <main>
            <nav>
                
                    <ul>
                        <li id="logo_large">
                            <img src="{{asset('images/logo.png')}}"  width="75" height="75"/>
                            <span id="logo_text2" class="logo_text">UserBoard</span>
                        </li>
                        
                        <li><i class="fa-solid fa-bars mobile" id="mobile_bar"></i></li>
                        <li><i class="fa-solid fa-bars mobile" id="desktop_bar"></i></li>
                        <li  class="length"></li>
                        <li><i class="fa-solid fa-search mobile"></i></li>
                        <li><i class="fa-solid fa-user mobile"></i></li>
                    </ul>
               
            </nav>
            <section>
                    
            @yield('content')
            
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
///Small screen code
</script>

</html>

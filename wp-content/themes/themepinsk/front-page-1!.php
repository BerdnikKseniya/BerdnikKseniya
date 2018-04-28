<!doctype html>
<html>

<head>
    <meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php wp_title('&laquo;', true, 'right'); ?>
        <?php bloginfo('name'); ?>
    </title>
    <!--    для связи с другими сайтами-->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    
    
    <!-- стили для меню -->
    <style type="text/css">
        input[type="checkbox"]#togglebox {
            position: absolute;
            left: 0;
            top: 0;
            visibility: hidden;
        }

        label#navtoggler {
            z-index: 9;
            display: block;
            position: relative;
            font-size: 8px;
            width: 4em;
            height: 2.5em;
            top: 0;
            left: 0;
            text-indent: -1000px;
            border: 0.6em solid black;
            border-width: 0.6em 0;
            cursor: pointer;
        }

        label#navtoggle:hover {}

        label#navtoggler::before {
            content: "";
            display: block;
            position: absolute;
            width: 100%;
            height: 0.6em;
            top: 50%;
            margin-top: -0.3em;
            left: 0;
            background: black;
        }

        nav.menu-home {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            visibility: hidden;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
            background: #c4d8fd;
            /*            background: url(images/background_home_menu.jpg);*/
            display: block;
            position: fixed;
            z-index: 100;
            opacity: 0;
            text-align: center;
            overflow: auto;
            -moz-transition: visibility 0s 0.5s, opacity 0.5s, -moz-transform 0.5s;
            -webkit-transition: visibility 0s 0.5s, opacity 0.5s, -webkit-transform 0.5s;
            transition: visibility 0s 0.5s, opacity 0.5s, transform 0.5s;
        }

        input[type="checkbox"]#togglebox:checked~nav.menu-home {
            visibility: visible;
            -webkit-transform: scale(1);
            transform: scale(1);
            opacity: 1;
            -ms-transition-delay: 0s;
            -moz-transition-delay: 0s;
            -webkit-transition-delay: 0s;
        }

        nav.menu-home label#closex {
            width: 80px;
            height: 80px;
            overflow: hidden;
            display: block;
            position: absolute;
            cursor: pointer;
            text-indent: -1000px;
            z-index: 10;
            top: 0;
            right: 0;
        }

        nav.menu-home label#closex::before,
        nav label#closex::after {
            content: "";
            display: block;
            position: absolute;
            width: 100%;
            height: 6px;
            background: black;
            top: 50%;
            margin-top: -3px;
            -ms-transform: rotate(-45deg);
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }

        nav.menu-home label#closex::after {
            -ms-transform: rotate(-135deg);
            -webkit-transform: rotate(-135deg);
            transform: rotate(-135deg);
        }

        nav.menu-home a {
            text-decoration: none;
            color: black;
            text-transform: uppercase;
        }

        nav.menu-home ul {
            list-style: none;
            margin: 0;
            padding: 0;
            position: relative;
            max-height: 100%;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            font-family: 'Arsenal', sans-serif;
            margin-top: 20%;
            font-size: 23px;
            text-align: center;
            font-weight: 600;
        }

        nav.menu-home ul li {
            margin-bottom: 25px;
        }

        nav.menu-home ul li a {
            padding: 10px;
            border-radius: 20px;
        }

        nav.menu-home ul li a:hover {
            background: #e1ecff;
        }
                
    </style>

    <!--    скрипт для открытия (закрытия) меню -->
    <script type="text/javascript">
        function expandfullscreenmenu(action) {
            var togglebox = document.getElementById("togglebox")
            var newstate = (action == 'open') ? true : (action == 'close') ? false : !togglebox.checked
            togglebox.checked = newstate
        }
    </script>
 
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background:#34762F; max-width:100%;">

    <!--    отображаем меню на странице -->
    <div class="menuwrapper">
        <input type="checkbox" id="togglebox">
        <label for="togglebox" id="navtoggler"></label>

        <nav class="menu-home">
            <label for="togglebox" id="closex">Close</label>
            <? wp_nav_menu(array('menu' => 'menu-home', 'menu_class' => 'menu-home')); ?>
        </nav>

    </div>


    <div class="map-pinsk">
        
        <svg id="map" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	  viewBox="0 0 1881 836" style="enable-background:new 0 0 1881 836;" xml:space="preserve">

            <rect id="ФОН" class="st0" width="1881" height="836" style="fill:#34762F"/>
            <path id="map-background" style="fill:#EEFFEE;" d="M730.6,225.4l37.3,84l-8.6,52.7l111.4,1.3v-35.3l8.5-30c0,0,13.5-19.4,17-22
                c4.4-3.3,59.5,50.9,64.3,47.3c5.8-4.2,4.4-5.5,10.7-10c9.6-6.9,30-4.7,30-4.7l-0.7-22l8.7-2l-14.7-47.3l70.7-17.3l9.3,61.3l10.7-2.7
                l-4.7-24l15.3-3.3l2.7,28l42.7-10l2.7,8l86-10l-3.3,18l57.3,104l31.3-20.7l26.7-8.7l110.7,182.7l-41.3,56.7l-129.3-42l-114.7,92
                l42.7,85.3l-20,6l-31.3-43.3l-14.7-30.7l-191.5,66.7l-81.8,56.7l-31.3-9.3l-38-27.3c0,0-53.9-24.8-60.7-25.3
                c-13.5-1.1-109.3-89.3-109.3-89.3l-57.3-8l0.7-52.7l-145.8,1.2l-34.9-7.8l-3.3-8l22-11.3l51.3-6l6.7-53.3l-56-16l-8.7-29.5l4.7-14.5
                l-4-35.3l14.7-10.7l44.7-0.7l-3.3-31.3l34.7-79.3l-50.7-14.7l-12-15.3l-17.3-8l-9.3,16.7l-87.3-32.7l12.7-27.3l124,34.7l4-12.7
                l-12.7-8l-35.3-54l7.3-111.3l139.3-15.3l-2.7,119.3l84.7,56.7L730.6,225.4z"/>
            <path id="river" style="fill:#29C5E6;" d="M1432.43,571.182l-5.388,7.318c0,0-36.949-2.5-47.711-2.5c-32,0-73.259-10.801-80-14.667
                c-5.823-3.34-11.503-7.078-18.664-1.333c-9.094,7.296-26.002,42.667-17.336,102c0.629,4.306-6.666,3.333-6.666,3.333
                s-1.051-39.044-1.118-40.833c-2-53.333,15.266-56.107,8.631-51.271c-22.906,16.696-81.098,59.806-102.18,71.438
                c-18.439,10.174-35.924,33.16-41.26,32.296c-1.407-0.227-7.56,11.473-28.74,22.37c-6.403,3.295-30.963,3.836-36,7.334
                c-2.602,1.807,2.249,5.26,0,7.333c-3.633,3.35-4.42-3.409-6.665,0.667c-4.327,7.857-0.236-9.733-4.668-8
                c-5.944,2.325-3.682-2.352-10.128,0.299c-17.063,7.018-62.079,29.186-62.079,29.186c-2.431-6.734-28.815,5.038-34.459,15.181
                c-1.173,2.107-2.522,13.198-14,26c-3.462,3.86-7.511,15.332-15.334,24.667c-7.475,8.921-18.588,10.179-23.331,12.667
                c-9.054,4.75-9.977,4.938-23.929,8c-8.836,1.939,0-4.667-22.74-20.667c-6.749-4.749-28.694-29.898-38-34.667
                c-8.621-4.418-18.667-12-37.333-9.333c-5.264,0.752-10.544-7.616-15.606-9.053c-23.333-6.623-44.394-11.614-44.394-11.614l-2.667-10
                l64,17.334l34,15.333c0,0,2.206-11.487,5.333-11.333c2.698,0.133,3.618,10.18,3.618,10.18s7.985,1.943,16.417,14.439
                c14.014,20.768,37.211,37.912,41.965,37.382c19.336-2.156,34.898-15.605,37.333-18.002c12.923-12.719,27.004-49.056,27.999-49.332
                c15.396-4.279,1.955-16.17,4.667-14c6.667,5.334,14.755,2.059,15.766-0.547c1.378-3.554,11.277-1.631,12.901-5.453
                c1.533-3.607-16.031-10.376-15.334-14c3.334-17.333-5.332-15.333,6.388-1.508c2.348,2.769,16.209,17.829,19.612,15.508
                c5.526-3.77,8.064,1.433,8.064,1.433s20.71-7.208,31.464-19.077c3.018-3.331,7.808-3.764,11.806-5.688
                c6.409-3.086-30.179,4.121-24.299,1.377c8.292-3.869-41.035-3.377,38.299-7.377c6.688-0.337,30.584-9.29,37.002-12
                c4.183-1.766-4.19,10.848,0,9.102c2.711-1.129,16.759-4.732,16.759-4.732l-0.812-9.037c0,0,3.448-0.919,8.388-2.878
                c4.939-1.959,11.368-4.959,17.329-9.122c3.061-2.138,7.633-5.613,12.572-9.455c2.095-1.629-43.215,14.789-2.996-3.667
                c24.564-11.272,28.477-16.468,29.091-16.878c24.669-16.467,26.78-13.031,41.333-22c18.491-11.396,3.04-2.276,47.047-36.995
                c14.757-11.643,7.186-7.519,16.209-17.354c3.791-4.131,12.49-8.874,19.913-14.984c14.191-11.682,30.905-25.938,50.165-33.467
                c22.852-8.933,23.333-17.2,35.333-19.896c2.935-0.659,50.187-0.021,50.187-0.021l3.105,5.125c0,0-41.685,1.165-44.611,1.348
                c-10.667,0.667-17.147,9.563-24.014,13.443c-13.214,7.467-27.164,14.796-37.173,19.465c-12.693,5.922-25.494,14.045-25.494,17.335
                c0,4.667,39.241,12,77.333,20.667C1373.739,569.458,1432.43,571.182,1432.43,571.182z"/>
            <path style="fill:#34762F;" d="M1328.667,510.533l-8.872,5.846c0,0-6.537,0.515-11.128,1.621c-5.658,1.364-13.688,6-15.159,6
                c-4.21,0-14.082-19.86-16.841-21.055c-2.759-1.194,13.333-12.606,13.333-12.606s0,0,12.818,7.513c1.6,0.938,3.83-0.519,5.936-0.519
                c2.104,0,4.109,0.185,5.934,0.519C1320.16,498.853,1328.667,510.533,1328.667,510.533z"/>
            <path style="fill:#34762F;" d="M1254.887,532.453c0,3.197-8.931,9.666-6.878,11.761c2.053,2.094,15.049,14.77,15.049,14.77
                c-7.417,0,12.281-9.317,12.281-9.317c-1.155,0.888-10.364-12.686-9.341-13.707c2.106-2.102,14.207-11.073,14.207-11.073
                L1267.697,509l-7.995,7.703c0,0-6.25,9.187-8.253,11.005C1249.11,529.827,1254.887,529.01,1254.887,532.453z"/>
            <path style="fill:#34762F;" d="M852.667,411.333c0,0.618-9.556-14.855-12.649-6.836c-1.351,3.501-9.826-5.358-12.684-5.66
                c-16.783-1.772-33.131,0.895-39.146,2.495c-2.629,0.699,3.146,6.667,3.146,6.667l8.667,3.335c0,0,0.139,10.658-0.667,11.999
                c-2.207,3.675-27.151-10.365-31.333-1.333c-9.333,20.156-17.333,10.667-33.333,44.672c2.059-4.376,13.015,13.479,10.667,17.815
                c-2.863,5.287,42.854-13.154,34.667-5.821c-7.092,6.352,16.729,30.861,8.188,36c-11.451,6.89-24.854-11.72-51.521-34.667
                c-3.318-2.855-0.667-11.414-20-16.14c-17.49-4.275,12.734-12.815,9.333-11.886c-36.667,10.025-6-22.641-10-33.308
                c-1.745-4.654,3.659-1.229,8.667-0.667c8.688,0.976,20.271,2.118,20.667,0.667c2-7.332,1.219-12.018,1.219-19.828
                c0-8.378-5.867-23.448,0.781-28.337c5.037-3.705,61.016,0,68,0c1.12,0,4.792,17.007,8.126,9.672
                c2.784-6.126-4.295-9.215,6.159-9.672c14.566-0.637,34.876-2.58,37.049,0C874.81,380.172,852.667,403.545,852.667,411.333z"/>
            <path style="fill:#34762F;" d="M1105.5,370.451c0,1.699-0.525,3.249-1.391,4.423c-1.001,1.36-5.476,2.215-7.098,2.215
                c-3.019,0-5.884,3.719-5.884,0.052c0-1.699-0.747-12.155,0.118-13.33c1.001-1.36-1.62,0,0,0c1.51,0,6.856-0.605,12.653,1.945
                C1105.324,366.383,1105.5,368.617,1105.5,370.451z"/>
            <polygon style="fill:#34762F;" points="1124.813,622.795 1128.539,624.129 1130.19,630.257 1130.036,635.276 1122.915,635.128 
                1118.672,634.727 1120.756,624.002 "/>
            <path style="fill:none;stroke:#000000;stroke-width:2;stroke-miterlimit:10;" d="M371,560.75c0,0,54.71-7.224,73-9.125
                c18.421-1.915,55.665-0.938,74-3.563c6.905-0.988,20.037-6.623,27-7.031c12.165-0.714,48,8.484,48,8.484s40.119,7.676,53,11.992
                c12.094,4.053,46.5,20.996,46.5,20.996s36.133,22.369,49.5,26.748c10.777,3.53,44.933,6.229,44.933,6.229l33.549,4.65
                c0,0,23.566,4.598,31.518,4.369c12.227-0.352,48-9.5,48-9.5l33,2.5l41.5,3l56,4l83,5l6.414-1.166"/>
            <path style="fill:none;stroke:#000000;stroke-width:2;stroke-miterlimit:10;" d="M464.667,388.667c0,0,95.754-1.899,127.364-6.013
                c18.08-2.353,71.303-15.32,71.303-15.32l50-0.667l112,2l103.338-1.246c0,0,26.252-0.761,34.995-0.422
                c5.104,0.198,15.241,1.768,20.348,1.826c9.445,0.107,29.01,0.654,37.652-3.159c2.324-1.025,5.407-5.505,7.666-6.667
                c10.848-5.577,48.334-6.667,48.334-6.667l-46.427,5.158L1016,353.5c0,0-11.834-0.269-17.673,0.817
                c-4.836,0.899-14.688,2.048-19.327,3.683c-4.538,1.599-17.004,9.02-17.004,9.02"/>
            <path style="fill:none;stroke:#000000;stroke-width:3;stroke-miterlimit:10;" d="M1049.333,140.669l33.748,202.485
                c0,0-7.315,2.557-6.248,9.18c0.833,5.167,7.167,5.167,7.167,5.167s12.357,73.999,15.5,99c3.352,26.665,11.5,60.937,17.5,102.5
                c0.51,3.53,3.856,9.318,7,15.669c2.076,4.193,0.431,14.076,1.333,18.666c0.604,3.072,5.333,11.334,5.333,11.334L1141,624.5
                l29.666,61.502l29.334,58l39.666,52.498"/>
            <path style="fill:none;stroke:#000000;stroke-width:3;stroke-miterlimit:10;" d="M1125,588.5c0,0,12.058,0.675,16,0
                c4.835-0.828,14.104-4.974,18.331-7c3.12-1.496,10.736-8.816,10.736-8.816l15.264,12.623c0,0,42.169-37.307,60.169-58.307
                c16.836-19.642,55.229-51.676,55.229-51.676S1332.79,446.999,1381,420.5c47.688-26.211,81.016-40.328,81.016-40.328"/>
            <path style="fill:none;stroke:#000000;stroke-width:2;stroke-miterlimit:10;" d="M1107.784,502.945c0,0,25.158-5.395,33.216-8.276
                c8.423-3.013,24.674-10.708,32.331-15.333c5.97-3.605,22.852-16,22.852-16s17.431-12.155,23.148-16.336
                c5.906-4.318,23.333-17.664,23.333-17.664l-3.164-6.667l43-30.669"/>
            <path style="fill:none;stroke:#000000;stroke-width:2;stroke-miterlimit:10;" d="M730.416,278.669L709.5,299.336v16.667
                c0,0,8.221,64.179,5.582,85.416c-1.331,10.716-10.056,31.126-10.417,41.918c-0.158,4.738,0.792,14.664,3.333,18.667
                c6.723,10.591,26.488,20.783,41.502,32.497c11.262,8.787,17.498,20.332,26.498,23.082C785.443,520.468,815.5,518,815.5,518
                c20.935-0.848,18.748-0.951,26.5,0c8.333,1.023,27.23,1.786,35.331-0.418c4.05-1.101,9.644-8.202,13.333-10.205
                c6.011-3.263,18.218-3.157,27.835-5.377c19.431-4.485,39.256-9.983,52.832-12.561c11.879-2.256,35.288-8.889,47.333-9.939
                c12.121-1.057,36.561,1.21,48.667,0c8.428-0.843,32.97-6.703,32.97-6.703"/>
            <path style="fill:none;stroke:#000000;stroke-width:2;stroke-miterlimit:10;" d="M1239.666,225c0,0-16.176,71.077-24.123,94
                c-5.707,16.461-11.713,41.211-20.4,66c-6.969,19.883-17.603,40.059-16.643,54c0.524,7.617,12.92,27.671,12.92,27.671"/>
            <circle style="fill:none;stroke:#000000;stroke-width:3;stroke-miterlimit:10;" cx="1084" cy="350.333" r="7.167"/>
            <path style="fill:none;stroke:#000000;stroke-width:2;stroke-miterlimit:10;" d="M485.5,591c0,0,2.428-21.348,2.5-28.5
                c0.105-10.501-2.829-41.91-2.829-41.91l-10.94-9.607L462.5,357.5l91.146-216.831L559,19"/>
            <path style="fill:none;stroke:#000000;stroke-width:2;stroke-miterlimit:10;" d="M523.493,213.71c0,0,0.628,5.919,5.94,8.323
                c4.945,2.237-0.103,6.552,94.067,17.967c6.496,0.788,19.652,1.413,26,3c5.983,1.496,17.369,6.837,23.5,7.5c8.872,0.96,16-1.5,35,7
                c7.036,3.147,22.416,21.169,22.416,21.169"/>
            <path style="fill:none;stroke:#000000;stroke-width:2;stroke-miterlimit:10;" d="M852,624.5c0,0-3.917-26.72-4-35.7
                c-0.047-5.05,1.44-15.448,4-19.8c3.033-5.156,13.747-11.735,17.243-16.589c3.927-5.452,5.835-17.91,5.537-26.411
                c-0.28-8-0.28-8-0.28-8s0.63-39.016,0-52c-0.583-12.027-3.5-35.969-4-48c-0.54-12.989,0-52,0-52"/>
            <path style="fill:none;stroke:#000000;stroke-width:2;stroke-miterlimit:10;" d="M668.896,571.25c0,0,3.104-8.75,10.604-10.75
                c8.197-2.185,13.642-1.965,17.5-3c7.721-2.071,58.866-0.516,66.822-1.291C783.255,554.313,801,552.5,801,552.5
                s4.634-10.176,7.567-12.588c5.211-4.286,7.908-7.694,14.433-9.412c7.312-1.925,15.485-2.666,23.044-2.809
                c4.655-0.088,25.433-3.445,33.956-3.191c4.56,0.136,18,3,18,3s24.352,2.4,32.5,2.5c14.466,0.177,43.402-1.489,57.788-3.021
                C997.252,526.023,1024,522,1024,522l38,1.5l6.022-7.336l40.799-5.631"/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="1193.5,388.5 1165.5,383.5 1157.5,340.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="890.5,646.5 891.5,652.5 854.5,656.5 854.5,650.5 
                900.5,645.5 899.5,633.5 923.5,631.5 923.5,616.5 "/>
            <path style="fill:none;stroke:#000000;stroke-width:2;stroke-miterlimit:10;" d="M1246.5,326.5l-36,5l0.318,0.125
                c0,0-35.257,5.513-47.009,7.35c-18.161,2.839-72.642,11.358-72.642,11.358L1246.5,326.5z"/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="1225.5,404.5 1216.5,412.5 1188.5,403.5 1193,391 
                1222,399 1240,423 1222,399 1269,368 "/>
            <line style="fill:none;stroke:#000000;stroke-miterlimit:10;" x1="1117.5" y1="384.5" x2="1178.5" y2="510.5"/>
            <line style="fill:none;stroke:#000000;stroke-miterlimit:10;" x1="1094.5" y1="421.5" x2="1163.5" y2="388.5"/>
            <line style="fill:none;stroke:#000000;stroke-miterlimit:10;" x1="1098.5" y1="419.5" x2="1132.5" y2="497.5"/>
            <path style="fill:none;stroke:#000000;stroke-miterlimit:10;" d="M1161.5,475.5"/>
            <path style="fill:none;stroke:#000000;stroke-miterlimit:10;" d="M1129.5,490.5"/>
            <path style="fill:none;stroke:#000000;stroke-miterlimit:10;" d="M1158.5,468.5"/>
            <path style="fill:none;stroke:#000000;stroke-miterlimit:10;" d="M1126.5,482.5"/>
            <path style="fill:none;stroke:#000000;stroke-miterlimit:10;" d="M1148.5,449.5"/>
            <path style="fill:none;stroke:#000000;stroke-miterlimit:10;" d="M1118.5,464.5"/>
            <path style="fill:none;stroke:#000000;stroke-miterlimit:10;" d="M1145.5,442.5"/>
            <path style="fill:none;stroke:#000000;stroke-miterlimit:10;" d="M1108.5,442.5"/>
            <path style="fill:none;stroke:#000000;stroke-miterlimit:10;" d="M1105.5,435.5"/>
            <path style="fill:none;stroke:#000000;stroke-miterlimit:10;" d="M1142.5,435.5"/>
            <path style="fill:none;stroke:#000000;stroke-miterlimit:10;" d="M1112.5,450.5"/>
            <path style="fill:none;stroke:#000000;stroke-miterlimit:10;" d="M1131.5,412.5"/>
            <path style="fill:none;stroke:#000000;stroke-miterlimit:10;" d="M1102.5,427.5"/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="1218.5,487.5 1190.5,506.5 1178.5,510.5 1113.5,538.5 "/>
            <line style="fill:none;stroke:#000000;stroke-miterlimit:10;" x1="1169.5" y1="481.5" x2="1228.5" y2="544.5"/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="1193.5,554.5 1169.5,523.5 1154.5,488.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="1200.5,547.5 1212.5,560.5 1203.5,568.5 1191.5,556.5 
                1170.5,572.5 1193.5,554.5 1247.5,505.5 "/>
            <line style="fill:none;stroke:#000000;stroke-miterlimit:10;" x1="1179.5" y1="475.5" x2="1238.5" y2="534.5"/>
            <path style="fill:none;stroke:#000000;stroke-miterlimit:10;" d="M1206.5,521.5"/>
            <line style="fill:none;stroke:#000000;stroke-miterlimit:10;" x1="1196.5" y1="463.5" x2="1250.5" y2="521.5"/>
            <line style="fill:none;stroke:#000000;stroke-miterlimit:10;" x1="959.5" y1="325.5" x2="1019.5" y2="446.5"/>
            <line style="fill:none;stroke:#000000;stroke-miterlimit:10;" x1="929.5" y1="398.5" x2="1057.5" y2="378.5"/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="869.5,552.5 894.5,582.5 895.5,615.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="665.5,367.5 660.5,402.5 637.5,429.5 582.5,490.5 
                485.5,520.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="409.5,435.5 418.5,414.5 416.5,391.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="545.5,385.5 542.5,373.5 559.5,336.5 570.5,339.5 
                580.5,368.5 605.5,398.5 614.5,352.5 619.5,328.5 624.5,304.5 497.5,275.5 506.5,278.5 552.5,334.5 567.5,338.5 635.5,358.5 
                653.125,369.516 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="640.5,205.5 637.359,241.103 621.5,240 621.5,254 
                621.5,253.5 567.5,338.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="529.5,36.5 496.5,71.5 483.5,86.5 480.5,103.5 
                471.5,113.5 447.5,153.5 421.5,171.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="462.5,156.5 518.5,184.5 529.5,157.5 534.5,138.5 
                532.5,118.5 523.5,108.5 508.5,83.5 464.5,40.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="416.5,89.5 455.5,98.5 512.5,147.5 544.5,162.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="845.5,518.5 840.5,441.5 872.5,441.5 872,438.5 904,438 
                1000,413 1090,392 1089.5,391.5 1119.5,384.5 1139.5,375.5 1133.5,343.5 1124.5,290.5 1075.5,298.5 1069.5,256.5 1031.5,260.5 
                1001.5,264.5 1031.5,260.5 1040.5,305.5 1075.5,300.5 1000.5,311.5 998.5,311.5 1005.5,353.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="896.5,526.5 896.5,531.5 871.5,546.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="768.5,734.5 773.5,721.5 773.5,712.208 810.5,709.5 
                811.5,656.5 811.5,657.5 852.5,636.5 851.5,624.5 857.5,680.5 864.5,704.5 837.5,715.5 810.5,709.5 765.5,712.5 756.5,712.5 
                753.5,701.5 729.5,689.5 710.5,686.5 731.5,690.5 731.5,681.5 746.5,687.5 760.5,687.5 772.5,697.5 782.5,702.5 782.5,711.367 
                794.5,710.5 794.5,721.5 787.5,742.5 768.5,734.5 752.5,724.5 756.5,712.5 753.5,701.5 775.5,679.5 775.5,664.5 763.5,665.5 
                811.5,660.5 788.5,662.5 790.5,643.5 786.5,615.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="1319.5,458.5 1312.5,442.5 1342.5,429.5 1348.5,439.5 "/>
            <line style="fill:none;stroke:#000000;stroke-miterlimit:10;" x1="1247.5" y1="443.5" x2="1277.5" y2="495.5"/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="1052.5,583.5 1096.5,563.5 1116.5,557.5 1156.5,545.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="1055.5,523.5 1097.5,604.5 1111.5,629.5 1098.5,629.5 
                1105.5,619.5 1131.5,606.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="980.5,598.5 947.5,529.5 950.5,536.5 942.5,551.5 
                953.5,577.5 956.5,575.5 971.5,602.5 1016.5,582.5 1005.5,556.5 923.5,588.5 932.5,617.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="1028.5,624.5 1027.5,645.5 1072.5,647.5 1071.5,667.5 
                1072.5,647.5 1080.5,627.5 1097.5,604.5 1124.5,589.5 1109.5,598.5 1096.5,563.5 "/>
            <polyline style="fill:none;stroke:#000000;stroke-miterlimit:10;" points="991.339,526.141 1018.339,586.141 1018.5,586.5 
                1024.5,623.5 1018.5,586.5 1056.5,558.5 1070.5,553.5 "/>
    
            <path id="path-map" style="fill:none;stroke:#89545B;stroke-width:4;stroke-miterlimit:10;" d="M730.3,227l37.3,84l-8.6,52.7l111.4,1.3v-35.3l8.5-30c0,0,13.5-19.4,17-22
                    c4.4-3.3,59.5,50.9,64.3,47.3c5.8-4.2,4.4-5.5,10.7-10c9.6-6.9,30-4.7,30-4.7l-0.7-22l8.7-2L994.3,239l70.7-17.3l9.3,61.3l10.7-2.7
                    l-4.7-24l15.3-3.3l2.7,28l42.7-10l2.7,8l86-10l-3.3,18l57.3,104l31.3-20.7l26.7-8.7l110.7,182.7L1411,601l-129.3-42L1167,651
                    l42.7,85.3l-20,6l-31.3-43.3l-14.7-30.7L952.2,735l-81.8,56.7l-31.3-9.3L801,755c0,0-53.9-24.8-60.7-25.3
                    c-13.5-1.1-109.3-89.3-109.3-89.3l-57.3-8l0.7-52.7l-145.8,1.2l-34.9-7.8l-3.3-8l22-11.3l51.3-6l6.7-53.3l-56-16l-8.7-29.5l4.7-14.5
                    l-4-35.3l14.7-10.7l44.7-0.7l-3.3-31.3L497,277l-50.7-14.7l-12-15.3l-17.3-8l-9.3,16.7L320.3,223l12.7-27.3l124,34.7l4-12.7l-12.7-8
                    l-35.3-54l7.3-111.3L559.7,29L557,148.3l84.7,56.7L730.3,227z"/>

            <circle class="hotel" style="fill:#F4B019;" cx="1206.571" cy="593.361" r="5.639"> 
                <animate fill="freeze" dur="0.1s" to="#4e86b1" from="#F4B019" attributeName="fill" begin="mouseover"/>
                <animate fill="freeze" dur="0.1s" to="#F4B019" from="#4e86b1" attributeName="fill" begin="mouseout"/>
            </circle>
            <circle class="hotel" style="fill:#F4B019;" cx="1318.861" cy="480.558" r="5.639">
                <animate fill="freeze" dur="0.1s" to="#4e86b1" from="#F4B019" attributeName="fill" begin="mouseover"/>
                <animate fill="freeze" dur="0.1s" to="#F4B019" from="#4e86b1" attributeName="fill" begin="mouseout"/>
            </circle>
            <circle class="hotel" style="fill:#F4B019;" cx="1057.396" cy="513.391" r="5.639">
                <animate fill="freeze" dur="0.1s" to="#4e86b1" from="#F4B019" attributeName="fill" begin="mouseover"/>
                <animate fill="freeze" dur="0.1s" to="#F4B019" from="#4e86b1" attributeName="fill" begin="mouseout"/>
            </circle>
            <circle class="hotel" style="fill:#F4B019;" cx="1178.376" cy="401.639" r="5.639">
                <animate fill="freeze" dur="0.1s" to="#4e86b1" from="#F4B019" attributeName="fill" begin="mouseover"/>
                <animate fill="freeze" dur="0.1s" to="#F4B019" from="#4e86b1" attributeName="fill" begin="mouseout"/>
            </circle>
            <path id="but-hotel" style="fill:#F4B019;" d="M1406.208,107.645h-166.5c-6.6,0-12-5.4-12-12v-22.5c0-6.6,5.4-12,12-12h166.5c6.6,0,12,5.4,12,12
                v22.5C1418.208,102.245,1412.808,107.645,1406.208,107.645z">
                <animate fill="freeze" dur="0.1s" to="#4e86b1" from="#F4B019" attributeName="fill" begin="mouseover"/>
                <animate fill="freeze" dur="0.1s" to="#F4B019" from="#4e86b1" attributeName="fill" begin="mouseout"/>
            </path>

        </svg>

</div>


<script type='text/javascript'>    
    jQuery('#but-hotel').on('click', function() {
        jQuery('.hotel').toggle("slow");
    });
</script>
    
</body>

</html>

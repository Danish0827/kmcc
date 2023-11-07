<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" cbtnmtents="width=device-width, initial-scale=1">
    <style>
        /** {*/
        /*    box-sizing: border-box;*/
        /*}*/

        /*body {*/
        /*    background-color: #f1f1f1;*/
        /*    padding: 20px;*/
        /*    font-family: Arial;*/
        /*}*/

        /* Center website */
        .mainsad {
            max-width: 100%;
            margin: auto;
        }


        .onslam {
            margin: 10px -16px;
        }

        /* Add padding BETWEEN each colms */
        /* .onslam,
        .onslam>.colms {
            padding: 8px;
        } */

        /* Create three equal colmss that floats next to each other */
        .colms {
            /* float: left; */
            width: 100%;
            display: none;
            /* Hide all elements by default */
        }

        /* Clear floats after onslams */
        .onslam:after {
            cbtnmtents: "";
            display: table;
            clear: both;
        }

        /* cbtnmtents */
        .cbtnmtents {
            /* background-color: white; */
            padding: 10px;
        }

        /* The "show" class is added to the filtered elements */
        .show {
            display: block;
        }

        /* Style the buttons */
        .cbtnms {
            border: none;
            outline: none;
            padding: 12px 16px;
            background-color: white;
            cursor: pointer;
        }

        .cbtnms:hover {
            background-color: #ddd;
        }

        .cbtnms.active {
            background-color: #666;
            color: white;
        }
    </style>
</head>

<body>

    <!-- mainsad (Center website) -->
    <div class="mainsad" style="padding-bottom:50px">



        <div id="mycbtnmsContainer" style="text-align: center;">
            <button class="cbtnms active" onclick="filterSelection('all')">All</button>
            <button class="cbtnms" onclick="filterSelection('food')">COLLEGE BUILDING</button>
            <button class="cbtnms" onclick="filterSelection('saree')">CLASS ROOM</button>
            <button class="cbtnms" onclick="filterSelection('twin')">LIABRARY </button>
            <button class="cbtnms" onclick="filterSelection('traditional')">SPORTS ROOM</button>
            <button class="cbtnms" onclick="filterSelection('pot')">NSS & DLLE OFFICE</button>
            <button class="cbtnms" onclick="filterSelection('lab')">COMPUTER LAB</button>
            <button class="cbtnms" onclick="filterSelection('garba')">CANTEEN</button>
        </div>

        <!-- Portfolio Gallery Grid -->
        <div class="onslam row">
            <div class="colms food">
                <div class="col-md-3 col-sm-6">
                    <div class="cbtnmtents">
                        <figure class="thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-img-wrap">
                                <img src="images/infra/1.png" alt="" width="370" height="370"> 
                            </div>
                            <figcaption class="thumbnail-classic-caption text-center">                                
                                <div class="offset-top-20 veil reveal-lg-block">
                                    <a class="thumbnail-classic-link icon novi-icon icon-xxs fa-search-plus" href="images/infra/1.jpg" data-lightgallery="item"><img src="images/infra/1.jpg" alt="" width="370" height="370"></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>  
            <div class="colms saree">
                <div class="col-md-3 col-sm-6">
                    <div class="cbtnmtents">
                        <figure class="thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-img-wrap">
                                <img src="images/infra/2.png" alt="" width="370" height="370"> 
                            </div>
                            <figcaption class="thumbnail-classic-caption text-center">                                
                                <div class="offset-top-20 veil reveal-lg-block">
                                    <a class="thumbnail-classic-link icon novi-icon icon-xxs fa-search-plus" href="images/infra/2.jpg" data-lightgallery="item"><img src="images/infra/2.jpg" alt="" width="370" height="370"></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="colms saree">
                <div class="col-md-3 col-sm-6">
                    <div class="cbtnmtents">
                        <figure class="thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-img-wrap">
                                <img src="images/infra/3.png" alt="" width="370" height="370"> 
                            </div>
                            <figcaption class="thumbnail-classic-caption text-center">                                
                                <div class="offset-top-20 veil reveal-lg-block">
                                    <a class="thumbnail-classic-link icon novi-icon icon-xxs fa-search-plus" href="images/infra/3.jpg" data-lightgallery="item"><img src="images/infra/3.jpg" alt="" width="370" height="370"></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="colms twin">
                <div class="col-md-3 col-sm-6">
                    <div class="cbtnmtents">
                        <figure class="thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-img-wrap">
                                <img src="images/infra/4.png" alt="" width="370" height="370"> 
                            </div>
                            <figcaption class="thumbnail-classic-caption text-center">                                
                                <div class="offset-top-20 veil reveal-lg-block">
                                    <a class="thumbnail-classic-link icon novi-icon icon-xxs fa-search-plus" href="images/infra/4.jpg" data-lightgallery="item"><img src="images/infra/4.jpg" alt="" width="370" height="370"></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="colms twin">
                <div class="col-md-3 col-sm-6">
                    <div class="cbtnmtents">
                        <figure class="thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-img-wrap">
                                <img src="images/infra/5.png" alt="" width="370" height="370"> 
                            </div>
                            <figcaption class="thumbnail-classic-caption text-center">                                
                                <div class="offset-top-20 veil reveal-lg-block">
                                    <a class="thumbnail-classic-link icon novi-icon icon-xxs fa-search-plus" href="images/infra/5.jpg" data-lightgallery="item"><img src="images/infra/5.jpg" alt="" width="370" height="370"></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="colms twin">
                <div class="col-md-3 col-sm-6">
                    <div class="cbtnmtents">
                        <figure class="thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-img-wrap">
                                <img src="images/infra/6.png" alt="" width="370" height="370"> 
                            </div>
                            <figcaption class="thumbnail-classic-caption text-center">                                
                                <div class="offset-top-20 veil reveal-lg-block">
                                    <a class="thumbnail-classic-link icon novi-icon icon-xxs fa-search-plus" href="images/infra/6.jpg" data-lightgallery="item"><img src="images/infra/6.jpg" alt="" width="370" height="370"></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="colms traditional">
                <div class="col-md-3 col-sm-6">
                    <div class="cbtnmtents">
                        <figure class="thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-img-wrap">
                                <img src="images/infra/7.png" alt="" width="370" height="370"> 
                            </div>
                            <figcaption class="thumbnail-classic-caption text-center">                                
                                <div class="offset-top-20 veil reveal-lg-block">
                                    <a class="thumbnail-classic-link icon novi-icon icon-xxs fa-search-plus" href="images/infra/7.jpg" data-lightgallery="item"><img src="images/infra/7.jpg" alt="" width="370" height="370"></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>  
            <div class="colms traditional">
                <div class="col-md-3 col-sm-6">
                    <div class="cbtnmtents">
                        <figure class="thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-img-wrap">
                                <img src="images/infra/8.png" alt="" width="370" height="370"> 
                            </div>
                            <figcaption class="thumbnail-classic-caption text-center">                                
                                <div class="offset-top-20 veil reveal-lg-block">
                                    <a class="thumbnail-classic-link icon novi-icon icon-xxs fa-search-plus" href="images/infra/8.jpg" data-lightgallery="item"><img src="images/infra/8.jpg" alt="" width="370" height="370"></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="colms traditional">
                <div class="col-md-3 col-sm-6">
                    <div class="cbtnmtents">
                        <figure class="thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-img-wrap">
                                <img src="images/infra/9.png" alt="" width="370" height="370"> 
                            </div>
                            <figcaption class="thumbnail-classic-caption text-center">                                
                                <div class="offset-top-20 veil reveal-lg-block">
                                    <a class="thumbnail-classic-link icon novi-icon icon-xxs fa-search-plus" href="images/infra/9.jpg" data-lightgallery="item"><img src="images/infra/9.jpg" alt="" width="370" height="370"></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="colms pot">
                <div class="col-md-3 col-sm-6">                
                    <div class="cbtnmtents">
                        <figure class="thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-img-wrap">
                                <img src="images/infra/10.png" alt="" width="370" height="370"> 
                            </div>
                            <figcaption class="thumbnail-classic-caption text-center">                                
                                <div class="offset-top-20 veil reveal-lg-block">
                                    <a class="thumbnail-classic-link icon novi-icon icon-xxs fa-search-plus" href="images/infra/10.jpg" data-lightgallery="item"><img src="images/infra/10.jpg" alt="" width="370" height="370"></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="colms pot">
            <div class="col-md-3 col-sm-6">                
                    <div class="cbtnmtents">
                        <figure class="thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-img-wrap">
                                <img src="images/infra/11.png" alt="" width="370" height="370"> 
                            </div>
                            <figcaption class="thumbnail-classic-caption text-center">                                
                                <div class="offset-top-20 veil reveal-lg-block">
                                    <a class="thumbnail-classic-link icon novi-icon icon-xxs fa-search-plus" href="images/infra/11.jpg" data-lightgallery="item"><img src="images/infra/11.jpg" alt="" width="370" height="370"></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="colms lab">
                <div class="col-md-3 col-sm-6">                
                    <div class="cbtnmtents">
                        <figure class="thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-img-wrap">
                                <img src="images/infra/12.png" alt="" width="370" height="370"> 
                            </div>
                            <figcaption class="thumbnail-classic-caption text-center">                                
                                <div class="offset-top-20 veil reveal-lg-block">
                                    <a class="thumbnail-classic-link icon novi-icon icon-xxs fa-search-plus" href="images/infra/12.jpg" data-lightgallery="item"><img src="images/infra/12.jpg" alt="" width="370" height="370"></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="colms lab">
                <div class="col-md-3 col-sm-6">                
                    <div class="cbtnmtents">
                        <figure class="thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-img-wrap">
                                <img src="images/infra/13.png" alt="" width="370" height="370"> 
                            </div>
                            <figcaption class="thumbnail-classic-caption text-center">                                
                                <div class="offset-top-20 veil reveal-lg-block">
                                    <a class="thumbnail-classic-link icon novi-icon icon-xxs fa-search-plus" href="images/infra/13.jpg" data-lightgallery="item"><img src="images/infra/13.jpg" alt="" width="370" height="370"></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div> 
            <div class="colms garba">
                <div class="col-md-3 col-sm-6">                
                    <div class="cbtnmtents">
                        <figure class="thumbnail-classic thumbnail-md">
                            <div class="thumbnail-classic-img-wrap">
                                <img src="images/infra/14.png" alt="" width="370" height="370"> 
                            </div>
                            <figcaption class="thumbnail-classic-caption text-center">                                
                                <div class="offset-top-20 veil reveal-lg-block">
                                    <a class="thumbnail-classic-link icon novi-icon icon-xxs fa-search-plus" href="images/infra/14.jpg" data-lightgallery="item"><img src="images/infra/14.jpg" alt="" width="370" height="370"></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        
            <!-- END GRID -->
        </div>

        <!-- END mainsad -->
    </div>

    <script>
    filterSelection("all");

    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("colms");
       
        if (c === "all") c = "";
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
        var activeButton = document.querySelector(".cbtnms.active");
        if (activeButton) {
            activeButton.classList.remove("active");
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) === -1) {
                element.className += " " + arr2[i];
            }
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    // Add active class to the current button (highlight it)
    var cbtnmsContainer = document.getElementById("mycbtnmsContainer");
    var cbtnmss = cbtnmsContainer.getElementsByClassName("cbtnms");
    for (var i = 0; i < cbtnmss.length; i++) {
        
        cbtnmss[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>

</body>

</html>
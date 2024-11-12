<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?php echo base_url("css/ui.css")?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ebbc1aa60f.js" crossorigin="anonymous"></script>
    <script src="app.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
</head>
<body>
    <div class="top">
        <div class="links">
            <a href="https://www.linkedin.com/in/gururaj-math-223360255/" target="_blank"><i
                    class='bx bxl-linkedin-square'></i></a>
            <a href="https://codepen.io/gururajmath"><i class='bx bxl-codepen' target="_blank"></i></a>
            <a href="https://github.com/Gururaj-Math" target="_blank"><i class='bx bxl-github'></i></a>
        </div>
        <div class="head">
             Blogger<span>.</span>
        </div>
        <div class="search">
            <i class='bx bx-search'></i>
            <i class="fa-solid fa-bars on hamburger"></i>
        </div>
    </div>
     <div class="alert">
                <ul class="navigation1">
                    <i class='bx bxs-x-circle close'></i>
                    <li><a href="#banner" class="out">HOME</a></li>
                    <li><a href="#news" class="out">SHOP</a></li>
                    <li><a href="#jobs" class="out">ABOUT</a></li>
                    <li><a href="#register" class="out">REVIEWS</a></li>
                </ul>
            </i>
        </div>
    </header> 
    <!--NAVBAR-->
    <div class="header">
        <ul class="navigation">
            <li><a href="#banner">HOME</a></li>
            <li><a href="#news">Blogs FEEDS</a></li>
            <li><a href="#events">News  Feed</a></li>
            <!-- <li><a href="#jobs">JOBS</a></li> -->
            <li><a href="#register">Contact us </a></li>
        </ul>
    </div>
    <!--HOME PAGE-->
    <div class="banner" id="banner">
        <swiper-container class="mySwiper" navigation="true">
            <swiper-slide>
                <div class="imgbx">
                    <a href="#news"><img src="https://i.postimg.cc/dtLWZmwx/pexels-cottonbro-studio-9656754.jpg"
                            alt=""></a>
                </div>
                <div class="text">
                    <h1>Blog FEEDS</h1>
         
                    <p>"Insights, Inspiration, and Ideas for a Better Tomorrow"</p>
                </div>
            </swiper-slide>
            <swiper-slide>
                <div class="imgbx">
                    <a href="#"><img src="https://i.postimg.cc/L8N4npDS/pexels-miguel-acosta-1259626.jpg" alt=""></a>
                </div>
                <div class="text">
                    <h1>Blogs  Feed</h1>

                    <p>Empowering Your Journey with Knowledge and Creativity".</p>
                </div>
            </swiper-slide>
            <swiper-slide>
                <div class="imgbx">
                    <a href="#"><img src="https://i.postimg.cc/8k27SNKn/pexels-arthouse-studio-4413745.jpg" alt=""></a>
                </div>
                <div class="text">
                    <h1>Blogs Feed </h1>
                    <p>"Explore, Learn, and Grow with Every Post"</p>
                </div>
            </swiper-slide>
        </swiper-container>
    </div>
    <!--NEWS SECTION-->
    <section class="news" id="news">
        <div class="titletext">
            
            <h1>Blogs <span>Feed</span></h1>
            <?php
                    
                    // print_r($data);
                    // $c = $data['image'];
                    
                    // die;
                                ?>
        </div>
        <div class="container">
            <?php foreach ($data as $data){?>
            <div class="card">
              <div class="card__header">
              <img src="<?php echo base_url().'uploadimg/'.$data['image']; ?>" alt="card__image" class="card__image" width="600">
              </div>
              <div class="card__body">
                <span class="tag">Blogs</span>
                <h4><?php echo $data["title"]?></h4>
                <h4><?php echo $data["description"]?></h4>
                <p></p>
              </div>
              <div class="card__footer">
                <div class="user">
                   <span>username</span>
                  <div class="user__info">
                    <h5><?php echo $data["name"]?></h5>
                    <small>2h ago</small>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
    </section>
    <!--EVENTS SECTION-->
    <section class="events" id="events">
        <div class="titletext">
            <h1>News   <span>feed</span></h1>
        </div>
        <div class="container">
        <?php foreach ($newsdata as $data){?>
            <div class="card">
              <div class="card__header">
              <img src="<?php echo base_url().'uploadimg/'.$data['image']; ?>" alt="card__image" class="card__image" width="600">
              </div>
              <div class="card__body">
                <span class="tag">News</span>
                <h4><?php echo $data["title"]?></h4>
                <h4><?php echo $data["description"]?></h4>
                <p></p>
              </div>
              <div class="card__footer">
                <div class="user">
                  <!-- <img src="https://i.pravatar.cc/40" alt="user__image" class="user__image"> -->
                   <span>username</span>
                  <div class="user__info">
                    <h5><?php echo $data["name"]?></h5>
                    <small>2h ago</small>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
    </section>
     <!--Avaiable jobs-->
    <!-- <section class="jobs" id="jobs">
        <div class="titletext">
            <h1>Available <span>Jobs</span></h1>
        </div>
        <div class="container">
            <div class="card">
              <div class="card__header">
                <img src="https://images.pexels.com/photos/3862370/pexels-photo-3862370.jpeg?auto=compress&cs=tinysrgb&w=600" alt="card__image" class="card__image" width="600">
              </div>
              <div class="card__body">
                <span class="tag">Jobs</span>
                <h4>Civil Engineers</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
              </div>
              <div class="card__footer">
                <div class="user">
                  <img src="https://i.pravatar.cc/40?img=52" alt="user__image" class="user__image">
                  <div class="user__info">
                    <h5>User 1</h5>
                    <small>2h ago</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card__header">
                <img src="https://images.pexels.com/photos/1181676/pexels-photo-1181676.jpeg?auto=compress&cs=tinysrgb&w=600" alt="card__image" class="card__image" width="600">
              </div>
              <div class="card__body">
                <span class="tag">Jobs</span>
                <h4>Data Analyst</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
              </div>
              <div class="card__footer">
                <div class="user">
                  <img src="https://i.pravatar.cc/40?img=53" alt="user__image" class="user__image">
                  <div class="user__info">
                    <h5>User 2</h5>
                    <small>Yesterday</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card__header">
                <img src="https://images.pexels.com/photos/1779487/pexels-photo-1779487.jpeg?auto=compress&cs=tinysrgb&w=600" alt="card__image" class="card__image" width="600">
              </div>
              <div class="card__body">
                <span class="tag">Jobs</span>
                <h4>Web Designer</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
              </div>
              <div class="card__footer">
                <div class="user">
                  <img src="https://i.pravatar.cc/40?img=54" alt="user__image" class="user__image">
                  <div class="user__info">
                    <h5>User 3</h5>
                    <small>2d ago</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
                <div class="card__header">
                  <img src="https://images.pexels.com/photos/7658352/pexels-photo-7658352.jpeg?auto=compress&cs=tinysrgb&w=600" alt="card__image" class="card__image" width="600">
                </div>
                <div class="card__body">
                  <span class="tag">Jobs</span>
                  <h4>Charted Accountant</h4>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
                </div>
                <div class="card__footer">
                  <div class="user">
                    <img src="https://i.pravatar.cc/40?img=55" alt="user__image" class="user__image">
                    <div class="user__info">
                      <h5>User 4</h5>
                      <small>2h ago</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card__header">
                  <img src="https://images.pexels.com/photos/5669603/pexels-photo-5669603.jpeg?auto=compress&cs=tinysrgb&w=600" alt="card__image" class="card__image" width="600">
                </div>
                <div class="card__body">
                  <span class="tag">Jobs</span>
                  <h4>Company Secretary</h4>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
                </div>
                <div class="card__footer">
                  <div class="user">
                    <img src="https://i.pravatar.cc/40?img=56" alt="user__image" class="user__image">
                    <div class="user__info">
                      <h5>User 5</h5>
                      <small>2h ago</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card__header">
                  <img src="https://images.pexels.com/photos/416405/pexels-photo-416405.jpeg?auto=compress&cs=tinysrgb&w=600" alt="card__image" class="card__image" width="600">
                </div>
                <div class="card__body">
                  <span class="tag tag-blue">Jobs</span>
                  <h4>Data Engineer</h4>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
                </div>
                <div class="card__footer">
                  <div class="user">
                    <img src="https://i.pravatar.cc/40?img=1" alt="user__image" class="user__image">
                    <div class="user__info">
                      <h5>User 6</h5>
                      <small>2h ago</small>
                    </div>
                  </div>
                </div>
              </div>
          </div>
    </section> -->
    <section class="register" id="register">
        <div class="titletext">
            <h1>Contact  <span>Us </span></h1>
        </div>
            <div class="form">
                <div class="formimg">
                    <img src="https://images.pexels.com/photos/768474/pexels-photo-768474.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
                </div> 
                <div >
                 <form action="<?php echo base_url("contactus")?>"class="formcontent" method="post">
                 <input type="text" placeholder="Username" name="name" required>
                    <input type="email" placeholder="Email" name="email"required>
                    <input type="number" placeholder="number" name="number"required>
                    <!-- <input type="email" placeholder="comment"> -->
                    <textarea class="form-control"name="comment" placeholder="comment "id="exampleFormControlTextarea1"style="width:300px "rows="5" required></textarea>
                    <button class="btn">Submit</button>


                 </form>

                </div>
            </div>
        </div>  
    </section>
    <section class="strip">
        <h1>Blogger</h1>
        <div class="icons">
            <a href="https://www.linkedin.com/in/gururaj-math-223360255/" target="_blank"><i class='bx bxl-linkedin-square'></i></a>
            <a href="https://codepen.io/gururajmath"><i class='bx bxl-codepen' target="_blank"></i></a>
            <a href="https://github.com/Gururaj-Math" target="_blank"><i class='bx bxl-github'></i></a>
            </div>
        </div>
    </section>
 
</body>
</html>
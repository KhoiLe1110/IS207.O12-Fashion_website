<style type="text/css">
p{
  font-size: 16px;
  color: #465b52;
  margin: 15px 0 20px 0;
}

.section-p1{
  padding: 40px 80px;
}

.section-m1{
  margin: 40px 0;
}

button.normal{
  font-size: 14px;
  font-weight: 600;
  padding: 15px 30px;
  color: #000000;
  background-color: #ffffff;
  border-radius: 4px;
  cursor: pointer;
  border: none;
  outline: none;
  transition: 0.2s;
}

button.white{
  font-size: 13px;
  font-weight: 600;
  padding: 11px 18px;
  color: #ffffff;
  background-color: transparent;
  cursor: pointer;
  border: 1px solid #ffffff;
  outline: none;
  transition: 0.2s;
}

body{
  width: 100%;
}

/*Header Starts*/
#header{
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px 80px;
  background: #E3E6F3;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.06);
  z-index: 999;
  position: sticky;
  top: 0;
  left: 0;
}

#navbar{
  display: flex;
  align-items: center;
  justify-content: center;
}

#navbar li{
  list-style: none;
  padding: 0 20px;
  position: relative;
}

#navbar li a{
  text-decoration: none;
  font-size: 16px;
  font-weight: 600;
  color: #1a1a1a;
  transition: 0.3s ease;
}

#navbar li a:hover, #navbar li a.active{
  color: #088178;
}

#navbar li a.active::after, #navbar li a:hover::after{
  content: "";
  width: 38%;
  height: 2px;
  background-color: #088178;
  position: absolute;
  bottom: -4px;
  left:  20px;
}
/*Header Ends*/

/*Homepage Starts*/
#hero{
  background-image: url("img/hero4.png");
  height: 90vh;
  width: 100%;
  background-size: cover;
  background-position: top 25% right 0;
  padding: 0 80px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
}

#hero h4{
  padding-bottom: 15px;
}

#hero h1{
  color: #088178;
}

#hero button{
  background-image: url("img/button.png");
  background-color: transparent;
  color: #088178;
  border: 0;
  padding: 14px 80px 14px 65px;
  background-repeat: no-repeat;
  cursor: pointer;
  font-weight: 700;
  font-size: 15px;
}

/*Homepage Ends*/

/*Feature Starts*/
#feature{
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
}

#feature .fe-box{
  width: 180px;
  text-align: center;
  padding: 25px 15px;
  box-shadow: 20px 20px 34px rgba(0, 0, 0, 0.03);
  border: 1px solid #cce7d0;
  border-radius: 4px;
  margin: 15px 0;
}

#feature .fe-box:hover{
  box-shadow: 10px 10px 54px rgba(70, 62, 221, 0.1);
}

#feature .fe-box img{
  width: 100%;
  margin-bottom: 10px;
}

#feature .fe-box h6{
  display: inline-block;
  padding: 9px 8px 6px 8px;
  line-height: 1;
  border-radius: 4px;
  color: #088178;
  background-color: #fddde4;
}

#feature .fe-box:nth-child(2) h6{
  background-color: #cdebbc;
}

#feature .fe-box:nth-child(3) h6{
  background-color: #d1e8f2;
}

#feature .fe-box:nth-child(4) h6{
  background-color: #cdd4f8;
}

#feature .fe-box:nth-child(5) h6{
  background-color: #f6dbf6;
}

#feature .fe-box:nth-child(6) h6{
  background-color: #fff2e5;
}
/*Feature Ends*/

/*Featured Products Starts*/
#product1{
  text-align: center;
}

#product1 .pro-container{
  display: flex;
  justify-content: space-between;
  padding-top: 20px;
  flex-wrap: wrap;
}

#product1 .pro{
  width: 23%;
  min-width: 250px;
  padding: 10px 12px;
  border: 1px solid #cce7d0;
  border-radius: 25px;
  cursor: pointer;
  box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.02);
  margin: 15px 0;
  transition: 0.2s ease;
  position: relative;
}

#product1 .pro:hover{
  box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.06);
}

#product1 .pro img{
  width: 100%;
  border-radius: 20px;
}

#product1 .pro .des{
  text-align: start;
  padding: 10px 0;
}

#product1 .pro .des span{
  color: #606063;
  font-size: 12px;
}

#product1 .pro .des h5{
  padding-top: 7px;
  color: #1a1a1a;
  font-size: 14px;
}

#product1 .pro .des i{
  font-size: 12px;
  color: rgb(243, 181, 25);
}

#product1 .pro .des h4{
  padding-top: 7px;
  font-size: 15px;
  font-weight: 700;
  color: #717fe0;
}

#product1 .pro .cart{
  width: 40px;
  height: 40px;
  line-height: 40px;
  border-radius: 50px;
  font-weight: 800;
  color: #ff7675;
  border: 1px solid #d63031;
  position: absolute;
  bottom: 20px;
  right: 10px;
}

/*Featured Products Ends*/

/*Banner Starts*/
#banner{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  background-image: url("imgages/b2.jpg");
  width: 100%;
  height: 40vh;
  background-size: cover;
  background-position: center;
}

#banner h4{
  color: #ffffff;
  font-size: 16px;
}

#banner h2{
  color: #ffffff;
  font-size: 30px;
  padding: 10px 0;
}

#banner h2 span{
  color: #ef3636;
}

#banner button:hover{
  background: #088178;
  color: #ffffff;
}
/*Banner Ends*/

/*sm-banner Starts*/
#sm-banner{
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}

#sm-banner .banner-box{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  background-image: url("images/b17.jpg");
  min-width: 650px;
  height: 50vh;
  background-size: cover;
  background-position: center;
  padding: 30px;
}

#sm-banner .banner-box2{
  background-image: url("images/b10.jpg");
}

#sm-banner h4{
  color: #ffffff;
  font-size: 20px;
  font-weight: 300;
}

#sm-banner h2{
  color: #ffffff;
  font-size: 20px;
  font-weight: 800;
}

#sm-banner span{
  color: #ffffff;
  font-size: 14px;
  font-weight: 500;
  padding-bottom: 15px;
}

#sm-banner .banner-box:hover button{
  background: #088178;
  border: 1px solid #088178;
}
/*sm-banner Ends*/

/*Banner3 Starts*/
#banner3{
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  padding: 0 80px;
}

#banner3 .banner-box{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  background-image: url("images/b7.jpg");
  min-width: 30%;
  height: 30vh;
  background-size: cover;
  background-position: center;
  padding: 20px;
  margin-bottom: 20px;
}

#banner3 .banner-box2{
  background-image: url("images/b4.jpg");
}

#banner3 .banner-box3{
  background-image: url("images/b18.jpg");
}

#banner3 h2{
  color: #ffffff;
  font-weight: 900;
  font-size: 22px;
}

#banner3 h3{
  color: #ec544e;
  font-weight: 800;
  font-size: 15px;
}
/*Banner3 Ends*/

/*Newsletter Starts*/
#newsletter{
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  align-items: center;
  background-image: url("img/banner/b14.png");
  background-repeat: no-repeat;
  background-position: 20% 30%;
  background-color: #041e42;
}

#newsletter h4{
  font-size: 22px;
  font-weight: 700;
  color: #ffffff;
}

#newsletter p{
  font-size: 14px;
  font-weight: 600;
  color: #818ea0;
}

#newsletter p span{
  color: #ffbd27;
}

#newsletter .form{
  display: flex;
  width: 40%;
}

#newsletter input{
  height: 3.125rem;
  padding: 0 1.25em;
  font-size: 14px;
  width: 100%;
  border: 1px solid transparent;
  border-radius: 4px;
  outline: none;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

#newsletter button{
  background-color: #088178;
  color: #ffffff; 
  white-space: nowrap;
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}
/*Newsletter Ends*/

/*Footer Starts*/
footer{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

footer .col{
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-bottom: 20px;
}

footer .logo{
  margin-bottom: 30px;
}

footer h4{
  font-size: 14px;
  padding-bottom: 20px;
}

footer p{
  font-size: 13px;
  margin: 0 0 8px 0;
}

footer a{
  font-size: 13px;
  text-decoration: none;
  color: #222222;
  margin-bottom: 10px;
}

footer .follow{
  margin-top: 20px;
}

footer .follow i{
  color: #465b52;
  padding-right: 4px;
  cursor: pointer;
}

footer .install .row img{
  border: 1px solid #088178;
  border-radius: 6px;
}

footer .install img{
  margin: 10px 0 15px 0;
}

footer .follow i:hover,
footer a:hover{
  color: #088178;
}

footer .copyright{
  width: 100%;
  text-align: center;
}
/*Footer Ends*/

/**Shop Page**/
/*Page Header Starts*/
#page-header{
  background-color: black;
  width: 100%;
  height: 40vh;
  background-size: cover;
  display: flex;
  justify-content: center;
  text-align: center;
  flex-direction: column;
  padding: 14px;
}

#page-header h2, 
#page-header p{
  color: #ffffff;
}
/*Page Header Ends*/

/*Pagination Starts*/
#pagination{
  text-align: center;
}

#pagination a{
  text-decoration: none;
  background-color: #088178;
  padding: 15px 20px;
  border-radius: 4px;
  color: #ffffff;
  font-weight: 600;
}

#pagination a i{
  font-size: 16px;
  font-weight: 600;

}
/*Pagination Ends*/

/**Simple Product Page**/
/*Prodetails Starts*/
#prodetails{
  display: flex;
  margin-top: 20px;
}

#prodetails .single-pro-image{
  width: 40%;
  margin-right: 50px;
}

.small-img-group{
  display: flex;
  justify-content: space-between;
}

.small-img-col{
  flex-basis: 24%;
  cursor: pointer;
}

#prodetails .single-pro-details{
  width: 50%;
  padding-top: 30px;
}

#prodetails .single-pro-details h4{
  padding: 40px 0 20px 0;

}

#prodetails .single-pro-details h2{
  font-size: 26px;
}

#prodetails .single-pro-details select{
  display: flex;
  padding:  5px 10px;
  margin-bottom: 10px;
}

#prodetails .single-pro-details input{
  width: 50px;
  height: 47px;
  padding-left: 10px;
  font-size: 16px;
  margin-right: 10px;
}

#prodetails .single-pro-details input:focus{
  outline: none;
}

#prodetails .single-pro-details button{
  background: #088178;
  color: #ffffff;
}

#prodetails .single-pro-details span{
  line-height: 25px;
}

/*Prodetails Ends*/

/* Blog page */
#page-header.blog-header{
  background-image: url("img/banner/b19.jpg");
}

#blog{
  padding: 150px 150px 0 150px;
}

#blog .blog-box{
  display: flex;
  align-items: center;
  width: 100%;
  position: relative;
  padding-bottom: 90px;
}

#blog .blog-img{
  width: 50%;
  margin-right: 40px;
}

#blog img{
  width: 100%;
  height: 300px;
  object-fit: cover;
}

#blog .blog-details{
  width: 50%;
}

#blog .blog-details a{
  text-decoration: none;
  font-size: 11px;
  color: #000;
  font-weight: 700;
  position: relative;
  transition: 0.3s;
}

#blog .blog-details a::after{
  content: "";
  width: 50px;
  height: 1px;
  background-color: #000;
  position: absolute;
  top: 4px;
  right: -60px;
}

#blog .blog-details a:hover{
  color: #088178;
}

#blog .blog-details a:hover:after{
  background-color: #088178;
}

#blog .blog-box h1{
  position: absolute;
  top: -40px;
  left: 0;
  font-size: 70px;
  font-weight: 700;
  color: #c9cbce;
  z-index: -9;
}

/* About Page */
#page-header.about-header{
  background-image: url("img/about/banner.png");
}

#about-head{
  display: flex;
  align-items: center;
}

#about-head img{
  width: 50%;
  height: auto;
}

#about-head div{
  padding-left: 40px;
}

#about-app {
  text-align: center;
}

#about-app .video{
  width: 70%;
  height: 100%;
  margin:30px auto 0 auto;
}

#about-app .video video {
  width: 100%;
  height: 100%;
  border-radius: 20px;
}

/* Contact Page */

#contact-details {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

#contact-details .details {
  width: 40%;
}

#contact-details .details span,
#form-details form span {
  font-size: 12px;
}

#contact-details .details h2,
#form-details form h2 {
  font-size: 26px;
  line-height: 35px;
  padding: 20px 0;
}

#contact-details .details h3 {
  font-size: 16px;
  padding-bottom: 15px;
}

#contact-details .details li {
  list-style: none;
  display: flex;
  padding: 10px 0;
}

#contact-details .details li i {
  font-size: 14px;
  padding-right: 22px;
}

#contact-details .details li p {
  margin: 0;
  font-size: 14px;
}

#contact-details .map {
  width: 55%;
  height: 400px;
}

#contact-details .iframe {
  width: 100%;
  height: 100%;
}

#form-details{
  display: flex;
  justify-content: space-between;
  margin: 30px;
  padding: 80px;
  border: 1px solid #e1e1e1;
}

#form-details form {
  width: 65%;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

#form-details form input,
#form-details form textarea {
  width: 100%;
  padding: 12px 15px;
  outline: none;
  margin-bottom: 20px;
  border: 1px solid #e1e1e1;
}

#form-details form button {
  background-color: #088178;
  color: #fff;
}

#form-details .people div{
  padding-bottom: 25px;
  display: flex;
  align-items: flex-start;
}

#form-details .people div img{
  width: 65px;
  height: 65px;
  object-fit: cover;
  margin-right: 15px;
}

#form-details .people div p{
  margin: 0;
  font-size: 13px;
  line-height: 25px;
}

#form-details .people div p span{
  display: block;
  font-size: 16px;
  font-weight: 600;
  color: #000;
}

/* Cart Page */
#cart table{
  width: 100%;
  border-collapse: collapse;
  table-layout: fixed;
  white-space: nowrap;
}

#cart table img{
  width: 70px;
}

#cart table td:nth-child(1){
  width: 100px;
  text-align: center;
}
#cart table td:nth-child(2){
  width: 150px;
  text-align: center;
}
#cart table td:nth-child(3){
  width: 250px;
  text-align: center;
}
#cart table td:nth-child(4),
#cart table td:nth-child(5),
#cart table td:nth-child(6){
  width: 150px;
  text-align: center;
}

#cart table td:nth-child(5) input{
  width: 55px;
  padding: 10px 5px 10px 15px;
}

#cart table thead{
  border: 1px solid #e2e9e1;
  border-left: none;
  border-right: none;
}

#cart table thead td{
  font-weight: 700;
  text-transform: uppercase;
  font-size: 13px;
  padding: 18px 0;
}

#cart table tbody tr td{
  padding-top: 15px;
}

#cart table tbody td{
  font-size: 13px;
}

#cart-add{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

#coupon{
  width: 50%;
  margin-bottom: 30px;
}

#coupon h3
#subtotal h3{
  padding-bottom: 15px;
}

#coupon input{
  padding: 10px 20px;
  outline: none;
  width: 60%;
  margin-bottom: 10px;
  border: 1px solid #e2e9e1;
}

#coupon button,
#subtotal button{
  background-color: black;
  color: #fff;
  padding: 12px 20px;
}

#subtotal{
  width: 50%;
  margin-bottom: 30px;
  border: 1px solid #e2e9e1;
  padding: 30px;
}

#subtotal table{
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 20px;
}

#subtotal table td{
  width: 50%;
  border: 1px solid #e2e9e1;
  padding: 10px;
  font-size: 13px;
}

/*USER PAGE*/
#log-container {
  max-width: 1050px;
  margin: 0 auto;
  padding: 20px;
  display: flex;
  justify-content: space-between;
}
#log-container .form-container{
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  width: 100%; /* Adjust the width as needed */
}

#log-container label {
  display: block;
  margin-bottom: 8px;
  font-weight: 600;
}

#log-container input {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

#log-container button {
  width: 100%;
  padding: 15px;
  color: #fff;
  background-color: #088178;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: 600;
  transition: background-color 0.3s ease;
}

#log-container button:hover {
  background-color: #065b4b;
}

#log-container select {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  appearance: none; /* Remove default arrow */
  background-image: linear-gradient(45deg, transparent 50%, #ccc 50%), linear-gradient(135deg, #ccc 50%, transparent 50%);
  background-position: calc(100% - 20px) calc(1em + 2px), calc(100% - 15px) calc(1em + 2px);
  background-size: 5px 5px, 5px 5px;
  background-repeat: no-repeat;
  cursor: pointer;
}

#log-container option {
  padding: 10px;
  font-size: 14px;
  background-color: #fff;
  color: #333;
}

/*My Account Page*/
.normal-title{
    background-color: #f7f7f7;
    border-top: 1px solid #ececec;
    border-bottom: 1px solid #ececec;
}
#page-wrapper {
    padding-top: 30px;
    padding-bottom: 30px;
}
.container {
    padding-left: 15px;
    padding-right: 15px;
}
</style>
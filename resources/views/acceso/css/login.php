<style type="text/css">
@media screen and (max-width: 639px) {
  .auth-main {
    padding-top: 70px;
    padding-bottom: 30px;
  }
}

.auth-main::before {
  content: '';
  position: absolute;
  left: 0;
  top: 0;
  width: 400px;
  height: 100%;
  z-index: -1;
  background: #0087CA;
}

@media screen and (max-width: 992px) {
  .auth-main::before {
    width: 320px;
  }
}

@media screen and (max-width: 640px) {
  .auth-main::before {
    width: 100%;
  }
}

.auth-main:after {
  content: '';
  position: absolute;
  right: 0;
  top: 0;
  width: 100%;
  height: 100%;
  z-index: -2;
}

.auth-main .card {
  background-color: transparent;
  -webkit-box-shadow: none;
          box-shadow: none;
  padding: 20px;
}

@media screen and (max-width: 640px) {
  .auth-main .card {
    padding-left: 0;
    padding-right: 0;
  }
}

.auth-main .card .header h3 {
  color: #212121;
}

.auth-main .card .body {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
}

.auth-main .mobile-logo {
  display: none;
}

.auth-main .mobile-logo img {
  width: 100px;
}

@media screen and (max-width: 640px) {
  .auth-main .mobile-logo {
    display: block;
    text-align: center;
    position: absolute;
    width: 100%;
    top: -60px;
  }
}

.auth-main .auth-box {
  background-color: #ffffff;
  border-radius: 0.55rem;
  max-width: 870px;
  width: calc(100% - 10px);
  height: auto;
  margin: 100px 0px 0px 100px;
  position: relative;
}

.auth-main .auth-box .auth-left {
  width: 300px;
  position: absolute;
  height: 100%;
}

.auth-main .auth-box .auth-left::before {
  content: "";
  width: 300px;
  height: 100%;
  background-color: #204E88;
  position: absolute;
  left: 0;
  border-radius: 6px 0 0 6px;
}

.auth-main .auth-box .auth-left .left-top {
  position: absolute;
  top: -80px;
  width: 100%;
  left: 30px;
}

.auth-main .auth-box .auth-left .left-top img {
  width: 180px;
}

.auth-main .auth-box .auth-left .left-top span {
  font-size: 20px;
  font-weight: 600;
  line-height: 50px;
  color: #ffffff;
  text-transform: uppercase;
  text-indent: 5px;
  letter-spacing: 2px;
}

.auth-main .auth-box .auth-left .left-slider {
  height: 100% !important;
  position: relative;
  border-radius: 6px 0 0 6px;
  overflow: hidden;
}

@media screen and (max-width: 640px) {
  .auth-main .auth-box .auth-left {
    display: none;
  }
}

.auth-main .auth-box .auth-right {
  padding-left: 300px;
  position: relative;
}

@media screen and (max-width: 640px) {
  .auth-main .auth-box .auth-right {
    padding-left: 0;
  }
}

.auth-main .auth-box .auth-right .card {
  -webkit-box-shadow: 3px 3px 20px 5px rgba(0, 0, 0, 0.05);
          box-shadow: 3px 3px 20px 5px rgba(0, 0, 0, 0.05);
}

.auth-main .auth-box .auth-right .right-top {
  position: absolute;
  right: 0;
  top: -60px;
}

@media screen and (max-width: 640px) {
  .auth-main .auth-box .auth-right .right-top {
    top: auto;
    bottom: -60px;
    left: 50%;
    -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
    right: auto;
  }
}

.auth-main .auth-box .auth-right .right-top ul li a {
  font-size: 16px;
  line-height: 60px;
  color: #777777;
}

@media screen and (max-width: 640px) {
  .auth-main .auth-box .auth-right .right-top ul li a {
    color: #242a2b;
  }
}

.auth-main .auth-box .form-auth-small .element-left {
  color: #212121;
  float: left;
}

.auth-main .auth-box .form-auth-small .element-right {
  float: right;
}

.auth-main .auth-box .form-auth-small .bottom {
  color: #212121;
}

.auth-main .auth-box .lead {
  font-size: 18px;
  font-weight: 600;
}

.auth-main .auth-box .helper-text {
  color: #212121;
}

@media screen and (max-width: 992px) {
  .auth-main .auth-box {
    margin: 0 20px;
  }
}

@media screen and (max-width: 640px) {
  .auth-main .auth-box {
    width: 90%;
  }
}

.auth-main .auth-box .bottom a {
  color: #212121;
  border-bottom: 1px solid #bdbdbd;
}

.auth-main .auth-box .separator-linethrough span {
  background-color: #ffffff;
}

.auth-main .auth-box a:focus,
.auth-main .auth-box button:focus {
  outline: none;
  -webkit-box-shadow: none;
          box-shadow: none;
}

footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;  
}

.img-fluid{
    height: 100% !important;
    width: 100% !important;
}

.fondo img{
    background-size: cover;
    width: 500px;
    height: 250px;
    position: absolute;
    left: 800px;
    top: 100px;
    opacity: .7;
}
</style>
!function(){var n=document.querySelector(".nav-MobileMenu"),t=document.querySelector(".nav-Links"),e=document.querySelector(".nav-Search"),i=document.querySelector(".nav-Footer");n.addEventListener("click",function(){t.classList.toggle("active"),e.classList.toggle("active"),i.classList.toggle("active")},!1)}();var device=window.device||{};device=function(){function n(){return s.ios()?(o("ios"),"ios"):s.android()?(o("android"),"android"):s.windows()?(o("windows"),"windows"):s.firefoxOS()?(o("fxOS"),"firefox"):!1}function t(){return s.phone()?(o("phone"),"phone"):s.tablet()?(o("tablet"),"tablet"):s.desktop()?(o("desktop"),"desktop"):!1}function e(){return window.innerHeight/window.innerWidth>1?"portrait":"landscape"}function i(n){var t=new RegExp(n,"g");return t.test(r)}function o(n){d.classList.add(n)}var r=navigator.userAgent.toLowerCase(),d=window.document.documentElement,s={iphone:function(){return i("iphone")},ipad:function(){return i("ipad")},ipod:function(){return i("ipod")},ios:function(){return this.iphone()||this.ipad()||this.ipod()},facebookBrowser:function(){return i("facebook")},android:function(){return i("android")},androidPhone:function(){return i("mobile")&&this.android()},androidTablet:function(){return!i("mobile")&&this.android()},windows:function(){return i("windows")},windowsPhone:function(){return i("phone")&&this.windows()},windowsTablet:function(){return i("touch")&&this.windows()},firefoxOS:function(){return i("; rv:")||i("mobile;")||i("tablet;")},firefoxOsPhone:function(){return i("mobile")&&this.firefoxOS()},firefoxOsTablet:function(){return i("tablet")&&this.firefoxOS()},phone:function(){return this.iphone()||this.ipod()||this.androidPhone()||this.windowsPhone()||this.firefoxOsPhone()},tablet:function(){return this.ipad()||this.androidTablet()||this.windowsTablet()||this.firefoxOsTablet()},desktop:function(){return!this.phone()&&!this.tablet()}};return{platform:n(),type:t(),orientation:e(),is:function(n){return s[n]()}}}();
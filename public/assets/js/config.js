"use strict";

/* -------------------------------------------------------------------------- */

/*                              Config                                        */

/* -------------------------------------------------------------------------- */
var CONFIG = {
  isNavbarVerticalCollapsed: false,
  theme: 'dark',
  isRTL: false,
  isFluid: false,
  navbarStyle: 'transparent',
  navbarPosition: 'vertical'
};
Object.keys(CONFIG).forEach(function (key) {
  if (localStorage.getItem(key) === null) {
    localStorage.setItem(key, CONFIG[key]);
  }
});

if (JSON.parse(localStorage.getItem('isNavbarVerticalCollapsed'))) {
  document.documentElement.classList.add('navbar-vertical-collapsed');
}

if (true){//localStorage.getItem('theme') === 'dark') {
  document.documentElement.classList.add('dark');
}
//# sourceMappingURL=config.js.map
function showWizzard(){
  let bt=document.getElementById('5491');
  bt.hidden=false;
}
function phonumber(){
  let n=document.getElementById('number');
  if(n.value.length==1){
    n.value="("+n.value;
  }else if(n.value.length==3){
    n.value=n.value+") ";
  }else if(n.value.length==6){
    n.value=n.value+" ";
  }else if(n.value.length==11){
    n.value=n.value+"-";
  }
}
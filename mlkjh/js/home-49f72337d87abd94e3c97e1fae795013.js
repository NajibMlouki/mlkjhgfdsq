(function(){var e,t,n,a,u,l;e=document.getElementById("first_name"),n=document.getElementById("last_name"),t=document.getElementById("first_name2"),a=document.getElementById("last_name2"),u=!!("placeholder"in document.createElement("input")),u||(e.value="First Name",e.onfocus=function(){return"First Name"===e.value?e.value="":void 0},e.onblur=function(){return""===e.value?e.value="First Name":void 0},t.onfocus=function(){return"First Name"===t.value?t.value="":void 0},t.onblur=function(){return""===t.value?t.value="First Name":void 0}),u||(n.value="Last Name",n.onfocus=function(){return"Last Name"===n.value?n.value="":void 0},n.onblur=function(){return""===n.value?n.value="Last Name":void 0},a.onfocus=function(){return"Last Name"===a.value?a.value="":void 0},a.onblur=function(){return""===a.value?a.value="Last Name":void 0}),window.submitRegistrationForm1=function(t){return window.submitRegistration(t,e,n)},window.submitRegistrationForm2=function(e){return t=document.getElementById("first_name2"),a=document.getElementById("last_name2"),window.submitRegistration(e,t,a)},window.submitRegistration=function(e,t,n){return""===t.value||""===n.value?(alert("Please enter your first name and last name to continue."),(null!=e?e.returnValue:void 0)&&(e.returnValue=!1),!1):(document.getElementById("submit_reg_search").className="loading",window.location="/register#list/firstname/"+t.value+"/lastname/"+n.value,!1)},window.rotateClass=function(e,t,n,a,u){var l,o,r;return null==a&&(a=2e3),null==u&&(u=!0),r=1,o=null,l=setInterval(function(){var a,i;return n>=r?(null!=(i=document.getElementById(o))&&(i.className=""),null!=(a=document.getElementById(""+e+r))&&(o=""+e+r,a.className=t),r+=1):u?r=1:clearInterval(l)},a)},l=window.rotateClass("p","show",3,4e3),l=window.rotateClass("e","show",3,4e3)}).call(this);
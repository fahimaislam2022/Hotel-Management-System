document.getElementById('editprofile').onsubmit = function(e){
e.preventDefault();


let name = document.getElementById('editname').value.trim();
let email = document.getElementById('editemail').value.trim();



document.getElementById('nameError').innerText ='';
document.getElementById('EmailError').innerText ='';
document.getElementById('Success').innerText ='';
document.getElementById('Error').innerText ='';

let valid =true;
//name
if(name ====''){
    document.getElementById('nameError').innerText='Please enter your name';
    valid= false;
}
//mail
 if(email === '' || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){
        document.getElementById('EmailError').innerText = 'Please enter valid email!';
        valid = false;
    }

if(valid){
        document.getElementById('Success').innerText = 'Profile updated successfully!';
    } else {
        document.getElementById('Error').innerText = 'Please fix the errors above.';
    }



};
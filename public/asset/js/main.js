const profileMenu = document.getElementById("profilemenu");
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

function AddRightPanel()
{
    container.classList.add('right-panel-active');
}
function RemoveRightPanel()
{
    container.classList.remove('right-panel-active');
}

function ProfileMenu(){
    profileMenu.classList.toggle("open-menu");
}




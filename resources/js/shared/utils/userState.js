export function isLogedIn(){
    return localStorage.getItem('isLoged') === true;
}



export function logIn(){
     localStorage.setItem('isLogedIn', true)
}

export function logOut(){
    localStorage.setItem("isLogedIn", false)
}

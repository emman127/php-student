let birthdate = document.getElementById('birthdate');

if(birthdate){
    birthdate.addEventListener('input', function() {
        let birthdate = new Date(document.getElementById('birthdate').value);
        let today = new Date();

        let age = today.getFullYear - birthdate.getFullYear();

        // document.getElementById('age').value = age;
        console.log(age);
    });
}
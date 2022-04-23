function ValidateEmail(input)
{
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(input.value.match(mailformat))
    {
        document.checkout.user_email.focus();
        return true;
    }

    else
    {
        alert("Your have entered an invalid email address!");
        document.checkout.action = 'checkout.php';
        return false;
    }
}
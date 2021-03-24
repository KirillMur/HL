var loginFields = document.getElementById('loginBlock');
loginButton = document.getElementById('login');
messageBox = document.getElementById('loginFormMessageBox');

window.onload = function() {
    var cookies = document.cookie ? document.cookie.split('; ') : [];
    var username;
    cookies.forEach(element => {
        if(element.match(/username=\w*/)) {
            username = decodeURIComponent(element).split('=').slice(1).toString();
        }
    })

    switch (username) {
        case 'false':
            loginStatusMessage('no user found');
            document.cookie = "username=''; path=/; max-age=-1";
            break;
        case 'invalid':
            loginStatusMessage('Invalid data inputs');
            document.cookie = "username=''; path=/; max-age=-1";
            break;
        case undefined:
            loginStatusMessage('please');
            loginButton.innerHTML = 'Log in,';
            messageBox.style.fontWeight = 'unset';
            break
        case username :
            loginStatusMessage('We found you, <b>', username + '</b>!');
            messageBox.style.color = 'darkorange';
            loginButton.innerHTML = 'Log Out';
            loginButton.style.fontWeight = 'bold';
            loginButton.addEventListener('click', function () {
                hideLoginForm();
                form.submit();
            })
    }
}

loginButton.onclick = function() {
    if (loginFields.style.display === 'inline') {
        hideLoginForm()
    } else {
        showLoginForm()
    }
}

function showLoginForm()
{
    loginFields.style.display = 'inline';
    messageBox.style.display = 'none';
}

function hideLoginForm()
{
    loginFields.style.display = 'none';
    messageBox.style.display = 'inline-block';
}

function loginStatusMessage(message, username = '')
{
    messageBox.innerHTML = message + username;
}
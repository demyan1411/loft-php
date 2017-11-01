window.onload = () => {
    const forms = {}
    document.querySelectorAll('form').forEach(form => {
        if (form.id === 'profile-form') return

        forms[form.id] = new Form(form, true, (res) => {
            if (form.id === 'reg-form' || form.id === 'login-form') {
                alert(res.success)
                window.location.href = res.redirect
            }
        });
    })

    const profileForm = document.querySelector('#profile-form')
    if (profileForm) {

        profileForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const formData = new FormData(profileForm)

           axios.post('/update-profile', formData).then(
               res => {alert(res.data.success)},
               err => {
                   alert(err.response.data.error)
               }
           )
        })
    }

    const users = document.getElementById('users');
    if (users) {
        users.addEventListener('click', (e) => {
            if (!e.target.classList.contains('delete-user')) return false

            e.preventDefault();

            const login = e.target.dataset.login
            axios.post('/delete-user', {login: login}).then(
                res => {
                    alert(res.data.success)
                    window.location.reload()
                },
                err => {
                    alert(err.response.data.error)
                }
            )
        })
    }

    const photos = document.getElementById('photos');
    if (photos) {
        photos.addEventListener('click', (e) => {
            if (!e.target.classList.contains('delete-photo')) return false

            e.preventDefault();

            const photo = e.target.dataset.photo
            axios.post('/delete-photo', {photo: photo}).then(
                res => {
                    alert(res.data.success)
                    window.location.reload()
                },
                err => {
                    alert(err.response.data.error)
                }
            )
        })
    }
}

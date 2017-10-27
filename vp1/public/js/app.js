class Form {
    constructor(form) {
        this.el = document.querySelector(form)
    }

    submit(method, url) {
        return axios({
            method: method,
            url: url,
            headers: {
                'Content-Type': 'application/json'
            },
            responseType: 'json',
            data: this.getData()
        })
            .then(res => res)
            .catch(err => Promise.reject(err))
    }

    async post(url) {
        return await this.submit('post', url);
    }

    getData() {
        let data = {};
        let elements = [...this.el.elements];

        elements.forEach(el => {
            let val = el.value;
            let name = el.name;

            if (el.type  === 'checkbox') {
                if (!Array.isArray(data[name])) data[name] = [];
                if (el.checked) data[name].push(val);
                return;
            }

            if (el.type  === 'radio' && el.checked) {
                data[name] = val;
                return;
            }

            if (el.type  !== 'checkbox' && el.type  !== 'radio') data[name] = val;
        });

        return data;
    }
}

window.onload = () => {
    const orderForm = new Form('#order-form')

    document.querySelector('#order-form').addEventListener('submit', e => {
        e.preventDefault()
        orderForm.post('/submit').then(
            res => {
                alert(res.data.success)
            },
            err => {
                alert(err.response.data.error)
            });
    })
}
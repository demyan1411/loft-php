class Form {
    constructor(form, isListen, cb) {
        this.el = form

        if (isListen) {
            this.cb = cb;
            this.createListener()
        }
    }

    createListener() {
        this.el.addEventListener('submit', e => {
            e.preventDefault()
            this.post(this.el.action).then(
                res => {
                    this.cb(res.data)
                },
                err => {
                    alert(err.response.data.error)
                }
            );
        })
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

            if (!name) return;

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

import axios from 'axios';

const getCsrfToken = metas => {
    for (const meta of metas) {
        if (meta.getAttribute('name') == 'csrf-token')
            return meta.getAttribute('content')
    }

    return ''
};
const metas = document.getElementsByTagName('meta');
const token = getCsrfToken(metas);

const instance = axios.create({
    timeout: 30 * 1000,
    headers: {
        'X-CSRF-TOKEN': token,
    }
});

export default instance

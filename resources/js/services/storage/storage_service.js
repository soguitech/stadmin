export function store(fullUrl, data, token) {
  return new Promise((res, rej) => {
    axios.post(fullUrl, data, {
      headers: {
        "Authorization": `Bearer ${token}`
      }
    })
      .then((response) => {
        res(response.data);
      })
      .catch((err) => {
        rej(err.response.status);
      })
  })
}

export const is404 = (err) => {
    return isErrorWithResponse && 404 === err.response.status;
};

export const is422 = (err) => {
    return isErrorWithResponse && 422 === err.response.status;
};

const isErrorWithResponse = err => {
    return err.response && err.response.status;
};

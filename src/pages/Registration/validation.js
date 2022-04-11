import * as yup from 'yup';

const schema = yup.object().shape({
    firstName: yup.string().required(),
    lastName: yup.string().required(),
    email: yup.string().email().required(),
    date: yup.date().required(),
    password: yup.string().min(6).required(),
})

export default schema;
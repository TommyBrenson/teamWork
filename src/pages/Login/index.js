import { Container, Typography, TextField, Box, Button, Link } from '@mui/material';
import Authorization from '../../components/Authorization/Authorization';
import { yupResolver } from '@hookform/resolvers/yup';
import validationSchema from './validation';
import api from '../../services/api/';
import { useAuth } from '../../services/hooks/useAuth';
import { useForm, Controller } from 'react-hook-form';
import { useState } from 'react';

const Login = () => {
    
    const [ isLoading, setIsLoading ] = useState(false);
    const auth = useAuth();

    const {
        control,
        handleSubmit,
        formState: { errors },
        setError,
    } = useForm ({
        resolver: yupResolver(validationSchema)
    });
    
    const onSubmit = async (data) => {
        try {
            console.log(data);
            setIsLoading(true);
            const { data: loginData } = await api.auth.login(data);
            auth.setToken(loginData.token);
            auth.setUser(loginData.user);
        } catch(e) {
            if (e.response.status === 422) {
                Object.keys(e.response.data.errors).forEach((key) => {
                  setError(key, {
                    type: "manual",
                    message: e.response.data.errors[key],
                  });
                });
        }} finally {
            setIsLoading(false);
        }
    }
    return (
        <form onSubmit = {handleSubmit(onSubmit)}>
            <Authorization label = 'АВТОРИЗАЦИЯ' >
                <Box textAlign = 'center' sx = {{ display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'space-around',  gap: '3vh', width: '80%', maxHeight: '80%' }} >
                    <Controller
                        name = 'email'
                        control = {control} 
                        defaultValue = ""
                        render = { ({ field }) => (    
                            <TextField 
                                {...field}
                                error = {Boolean(errors.email?.message)}
                                id = 'email-input' 
                                label = 'Адрес эл. почты' 
                                type = 'email'
                                variant = 'standard'
                                helperText = {errors.email?.message}
                                sx = {{ width: '80%' }}
                            />
                        )
                        }
                        />
                        <Controller
                        name = 'password'
                        control = {control} 
                        defaultValue = ""
                        render = { ({ field }) => (    
                            <TextField 
                                {...field}
                                error = {Boolean(errors.password?.message)}
                                id = 'password-input' 
                                label = 'Пароль' 
                                type = 'password'
                                variant = 'standard'
                                helperText = {errors.password?.message}
                                sx = {{ width: '80%' }}
                            />
                        )
                        }
                        />
                        <Button variant = 'contained' type = 'submit' disabled = {isLoading} color = 'success' sx = {{ borderRadius: '2vw' }} >Войти</Button>
                        <Typography variant = 'h6' fontWeight = {300} >Нет аккаунта? <Link variant = 'h6' color = 'common.white' fontWeight = {300} href = '/registration'>Зарегистрируйся!</Link> </Typography>
                </Box>
            </Authorization>
        </form>
    )
}

export default Login;
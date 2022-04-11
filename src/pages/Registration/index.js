import { Box, Typography, TextField, Button, Link } from '@mui/material';
import { DatePicker } from '@mui/x-date-pickers/DatePicker';
import { AdapterDateFns } from '@mui/x-date-pickers/AdapterDateFns';
import { LocalizationProvider } from '@mui/x-date-pickers/LocalizationProvider';
import Authorization from '../../components/Authorization/Authorization';
import api from '../../services/api';
import validationSchema from './validation';
import { useState } from 'react';
import { useAuth } from '../../services/hooks/useAuth';
import { useForm, Controller } from 'react-hook-form';
import { yupResolver } from '@hookform/resolvers/yup';


const Registration = () => {
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
            setIsLoading(true);
            console.log(data);
            //api method call for auth.registration using data
            await api.auth.registration(data);
            const { data: loginData } = await api.auth.login(data);
            auth.setToken(loginData.token);
            auth.setUser(loginData.user);
        } catch(e) {
            if (e.response.status === 422) {
                Object.keys(e.response.data.errors).forEach((key) => {
                    setError(key, {
                        type: 'manual',
                        message: e.response.data.errors[key],
                    });
                });
            }
        } finally {
            setIsLoading(false);
        }
    }

    return(
        <form onSubmit = {handleSubmit(onSubmit)} >
        <Authorization label = 'РЕГИСТРАЦИЯ'>
            <Box textAlign = 'center' sx = {{ display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'space-around',  gap: '3vh', width: '80%', maxHeight: '80%' }} >
                <Box sx = {{ display: 'flex', flexDirection: 'row', alignItems: 'center', justifyContent: 'space-between', width: '100%' }}>
                    <Controller
                        name = 'firstName'
                        control = {control} 
                        defaultValue = ""
                        render = { ({ field }) => (    
                            <TextField 
                                {...field}
                                error = {Boolean(errors.firstName?.message)}
                                id = 'firstname-input' 
                                label = 'Имя' 
                                variant = 'standard'
                                helperText = {errors.firstName?.message}
                            />
                        )
                        }
                        />
                        <Controller
                        name = 'lastName'
                        control = {control} 
                        defaultValue = ""
                        render = { ({ field }) => (    
                            <TextField 
                                {...field}
                                error = {Boolean(errors.lastName?.message)}
                                id = 'lastname-input' 
                                label = 'Фамилия' 
                                variant = 'standard'
                                helperText = {errors.lastName?.message}
                            />
                        )
                        }
                        />
                </Box>
                <Controller
                        name = 'email'
                        control = {control} 
                        defaultValue = ""
                        render = { ({ field }) => (    
                            <TextField
                                {...field}
                                error = {Boolean(errors.email?.message)}
                                id = 'email-input' 
                                type = 'email'
                                label = 'Адрес эл. почты'
                                variant = 'standard'
                                helperText = {errors.email?.message}
                                sx = {{ width: '100%' }}
                            />
                        )
                        }
                />
                {/* <Controller 
                    name = 'date'
                    control = {control}
                    defaultValue = ""
                    render = { ({ field }) => (
                        <BasicDatePicker 
                            {...field}
                            error = {Boolean(errors.date?.message)}
                            id = 'birthdate-input' 
                            label = 'Дата рождения' 
                            helperText = {errors.date?.message}
                            sx = {{ width: '100%' }}
                        />
                    )

                    }
                    /> */}
                    {/* <Controller
                    name = 'date'
                    control = {control}
                    defaultValue = ""
                    render = { ({ field}) => (
                        <LocalizationProvider dateAdapter = {AdapterDateFns}>
                        <DatePicker
                                disableFuture
                                label="Дата рождения"
                                onChange = { (newValue) => console.log(newValue) }
                                renderInput={(params) => <TextField 
                                                            error = {Boolean(errors.date?.message)}
                                                            variant = 'standard' {...params} 
                                                            sx = {{ width: '100%'}} 
                                                            helperText = "Use valid date format"/>}
                        />
                    </LocalizationProvider>
                    )} /> */}
                <Controller
                        name = 'password'
                        control = {control} 
                        defaultValue = ""
                        render = { ({ field }) => (    
                            <TextField 
                                {...field}
                                error = {Boolean(errors.password?.message)}
                                id = 'password-input' 
                                type = 'password'
                                label = 'Пароль' 
                                variant = 'standard'
                                helperText = {errors.password?.message}
                                sx = {{ width: '100%' }}
                            />
                        )
                        }
                />
                <Button variant = 'contained' type = 'submit' disabled = {isLoading} color = 'success' sx = {{ borderRadius: '2vw' }} >Зарегистрироваться</Button>
                <Typography variant = 'h6' fontWeight = {300} >Уже есть аккаунт? <Link variant = 'h6' color = 'common.white' fontWeight = {300} href = '/login'>Авторизируйся!</Link> </Typography>
            </Box>
            
        </Authorization>
        </form>
    )
}

export default Registration;
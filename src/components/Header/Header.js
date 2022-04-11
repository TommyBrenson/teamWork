import Logo from '../../assets/img/header_logo.png';
import { Link, AppBar, Container, Toolbar, Button, Box, Typography} from '@mui/material';
import { useAuth } from '../../services/hooks/useAuth/';
import { typoStyle } from '../styleHelpers';
import { NavLink } from 'react-router-dom';
import { AuthContext } from '../../services/contexts/AuthContext/';


const ButtonH = ({value}) => (
    <Button sx = {typoStyle}>{value}</Button>
)

const Header = () => {
    
    const auth = useAuth();
    return (
        <div>
            <AppBar
                color = 'primary'
                position = 'static'
                sx = {{
                    background: '#2B2B2B',
                    height: 'auto',
                    maxHeight: '30vh',
            }}>
                <Container maxWidth = 'xl'>
                    <Toolbar disableGutters
                    sx = {{
                        display: 'flex',
                        flexGrow: '1',
                        alignItems: 'center',
                        justifyContent: 'space-evenly'
                    }}>
                        <Box sx={{ flexGrow: 1, width: '60vh', display: { xs: 'block', md: 'flex' }, justifyContent: 'space-evenly', alignItems: 'center'}}>
                            <Link sx = {typoStyle} variant = "button" underline = "none" href = "/#goals">Цели</Link>
                            <Link sx = {typoStyle} variant = "button" underline = "none" href = "/#tools">Инструменты</Link>
                            <Link sx = {typoStyle} variant = "button" underline = "none" href = "/#about">О нас</Link>
                        </Box>
                        
                            <Box sx = {{ flexGrow: 1 }}>
                                <Link href = "/">
                                    <img 
                                        src = {Logo} 
                                        alt = "" 
                                        variant = "button" 
                                        style = {{ marginLeft: 'auto', marginRight: 'auto', display: 'block', width: '7vh', heigth: 'auto'}}
                                    />
                                </Link>
                            </Box>
                        <Box sx={{ flexGrow: 1, width: '60vh', display: { xs: 'block', md: 'flex' }, justifyContent: 'space-evenly', alignItems: 'center'}}>  
                            <Link sx = {typoStyle} variant = "button" underline = "none" href = "/#">FAQ</Link>
                            {   (!auth.user) ? (
                                    <Link sx = {typoStyle} variant = "button" underline = "none" href = "/registration" >Вход/Регистрация</Link>)
                                : (
                                    <>
                                    <Link sx = {typoStyle} variant = "button" underline = "none" href = "/profile">Личный кабинет</Link>
                                    <Button sx = {typoStyle} variant = "button" underline = "none">Выход</Button>
                                    </>
                                )
                            }
                            </Box>
                    </Toolbar>
                </Container>
            </AppBar>
        </div>
    );
}

export default Header;
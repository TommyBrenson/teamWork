import Image from '../../img/header_bg.png';
import Logo from '../../img/header_logo.png';
import { Link, AppBar, Container, Toolbar, Button, Box, Typography} from '@mui/material';
import { typoStyle } from '../styleHelpers';
const elements = ['Цели', 'Инструменты', 'О нас', 'Поиск', 'Вход', 'Регистрация', 'Выход'];




const ButtonH = ({value}) => (
    <Button sx = {typoStyle}>{value}</Button>
)

const Header = () => {
    return (
        <div>
            <AppBar
                color = 'primary'
                position = 'static'
                sx = {{
                    backgroundImage: `url(${Image})`,
                    backgroundSize: 'cover',
                    backGroundRepeat: 'no-repeat',
                    height: 'auto',
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
                            <Link sx = {typoStyle} variant = "button" underline = "none" href = "#goals">Цели</Link>
                            <Link sx = {typoStyle} variant = "button" underline = "none" href = "#tools">Инструменты</Link>
                            <Link sx = {typoStyle} variant = "button" underline = "none" href = "#">О нас</Link>
                        </Box>
                        <Box sx = {{ flexGrow: 1 }}>
                            <img 
                                src = {Logo} 
                                alt = "" 
                                variant = "button" 
                                style = {{ marginLeft: 'auto', marginRight: 'auto', display: 'block', width: '7vh', heigth: 'auto'}}
                            />
                        </Box>
                        <Box sx={{ flexGrow: 1, width: '60vh', display: { xs: 'block', md: 'flex' }, justifyContent: 'space-evenly', alignItems: 'center'}}>  
                            <Link sx = {typoStyle} variant = "button" underline = "none" href = "#">Поиск</Link>
                            <Link sx = {typoStyle} variant = "button" underline = "none" href = "#">Вход/Регистрация</Link>
                            <Link sx = {typoStyle} variant = "button" underline = "none" href = "#">FAQ</Link>
                        </Box>
                    </Toolbar>
                </Container>
            </AppBar>
        </div>
    );
}

export default Header;
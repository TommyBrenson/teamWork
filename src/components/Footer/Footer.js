import { Container, Box, Typography, Stack, Link } from '@mui/material';
import FBackground from '../../img/footer_bg.png';
import { typoStyle } from '../styleHelpers';
import EmailIcon from '@mui/icons-material/Email';
import TelegramIcon from '@mui/icons-material/Telegram';
import InstagramIcon from '@mui/icons-material/Instagram';

const Footer = () => {
    return (
        <Container disableGutters sx = {{ display: 'flex', alignItems: 'center', justifyContent: 'center', backgroundImage: `url(${FBackground})`, backgroundSize: '100% 100%' }} >
            <Box sx = {{ display: 'flex', flexFlow: 'row no-wrap', alignItems: 'center', justifyContent: 'space-between', width: '90vw', height: 'auto', p: 4 }} >
                <Box sx = {{ borderTop: '4px solid #88009E', width: '35vw' }}>
                    <Typography variant = 'h4' lineHeight = '2'>© 2022 DINAMICPROGRESS.RU <br></br> Сервис достижения целей</Typography>
                </Box>
                <Box sx = {{ display: 'flex', flexDirection: 'row', alignItems: 'center', justifyContent: 'space-around', width: '10vw', height: '5vh' }}>
                    <Link color = 'common.white'>
                        <EmailIcon fontSize = 'large'></EmailIcon>
                        <TelegramIcon fontSize = 'large' color = 'common.white'></TelegramIcon>
                        <InstagramIcon fontSize = 'large' color = 'common.white'></InstagramIcon>
                    </Link>
                </Box>
                    <Stack 
                        direction = 'row'
                        spacing = {4}
                        sx = {{ display: 'flex', flexDirection: 'row', alignItems: 'center', justifyContent: 'center', width: '35vw' }}
                    >
                        <Box sx = {{ display: 'flex', flexDirection: 'column' }}>
                            <Link color = 'common.white' variant = "h5" underline = "always" href = "#">ЦЕЛИ</Link>
                            <Link color = 'common.white' variant = "h5" underline = "always" href = "#">КОНТАКТЫ</Link>
                            <Link color = 'common.white' variant = "h5" underline = "always" href = "#">О НАС</Link>
                        </Box>
                        <Box sx = {{ display: 'flex', flexDirection: 'column' }}>
                            <Link color = 'common.white' variant = "h5" underline = "always" href = "#">PRO</Link>
                            <Link color = 'common.white' variant = "h5" underline = "always" href = "#">FAQ</Link>
                            <Link color = 'common.white' variant = "h5" underline = "always" href = "#">СОГЛАШЕНИЕ</Link>
                        </Box>
                    </Stack>
            </Box>
        </Container>
    )    
}

export default Footer;
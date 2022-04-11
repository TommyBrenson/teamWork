import { Container, Box, Typography, Stack, Link, IconButton } from '@mui/material';
import EmailIcon from '@mui/icons-material/Email';
import TelegramIcon from '@mui/icons-material/Telegram';
import InstagramIcon from '@mui/icons-material/Instagram';

const Footer = () => {
    return (
        <Container disableGutters sx = {{ display: 'flex', alignItems: 'center', justifyContent: 'center', background: `#2A2A2A` }} >
            <Box sx = {{ display: 'flex', flexFlow: 'row no-wrap', alignItems: 'center', justifyContent: 'space-between', width: '90vw', height: 'auto', p: 4 }} >
                <Box sx = {{ borderTop: '4px solid #88009E', width: '35vw' }}>
                    <Typography variant = 'h4' lineHeight = '2'>© 2022 DINAMICPROGRESS.RU <br></br> Сервис достижения целей</Typography>
                </Box>
                <Box sx = {{ display: 'flex', flexDirection: 'row', alignItems: 'center', justifyContent: 'space-around', width: '10vw', height: '5vh' }}>
                    
                        <IconButton sx = {{ color: 'white' }} onClick = {() => window.open('https://www.gmail.com', '_blank')}>
                            <EmailIcon fontSize = 'large'></EmailIcon>
                        </IconButton>
                        <IconButton sx = {{ color: 'white' }} onClick = {() => window.open('https://www.telegram.org', '_blank')}>
                            <TelegramIcon fontSize = 'large' color = 'common.white'></TelegramIcon>
                        </IconButton>
                        <IconButton sx = {{ color: 'white' }} onClick = {() => window.open('https://www.instagram.com', '_blank')}>
                            <InstagramIcon fontSize = 'large' color = 'common.white'></InstagramIcon>
                        </IconButton>
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
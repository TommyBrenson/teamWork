import { Container, Box, Typography, Button, Grid } from '@mui/material';
import { styled } from '@mui/material/styles'
import IphoneImage from '../../img/iphone.png';
import GBackground from '../../img/greeting_bg.jpg';
import TBackground from '../../img/tools_bg.png';
import StarImage from '../../img/star_figure.png';




const Main = () => {
    return (
    <Container disableGutters sx = {{  display: 'flex', justifyContent: 'center', alignItems: 'center', marginRight: 0, marginLeft: 0, flexDirection: 'column' }}>
        <Container sx = {{ width: '100%', backgroundImage: `url(${GBackground})`, backgroundSize: 'auto', display: { xs: 'block', md: 'flex', lg: 'flex' }, justifyContent: 'space-evenly', alignItems: 'center', flexDirection: 'row' }}>
                <Box sx = {{ display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'space-between' }}>
                    <Box  sx = {{ padding: '5vh', maxWidth: '110vh', m: 1, textAlign: 'center' }} >
                        <Typography variant = 'h2' sx = {{ mb: 5 }} >Начните достигать своих целей сегодня</Typography>
                        <Typography variant = 'h4' sx = {{ lineHeight: 1.6 }} >DINAMICPROGRESS — это онлайн-программа для постановки целей, которая помогает вам создавать цели и управлять ими, чтобы быстрее добиться успеха. Он имеет интуитивно понятный процесс, который делает процесс постановки целей простым и легким. Это так весело, что вы удивитесь, почему не начали раньше.</Typography>
                    </Box>
                    <Button sx = {{ background: 'rgba(0, 0, 0, 0.3)', fontSize: '1.3em', m: 3.5, width: '60vh', height: '9vh', color: 'beige', border: '3px solid beige', letterSpacing: '0.3em'}}>Присоединиться</Button>
                </Box>
                <Box><img src = {IphoneImage} alt = '' style = {{ maxWidth: 'auto', maxHeight: '90vh'}}/></Box>
        </Container>
        <Container sx = {{ display: {xs: 'block', md: 'flex', lg: 'flex'}, flexDirection: 'column', justifyContent: 'center', alignItems: 'center', backgroundImage: `url(${TBackground})`, }} >
            <Box color = '#100C08' sx = {{ textAlign: 'center', mt: 2}} >
                <Typography variant = 'h4' sx = {{ fontWeight: 400 }} >РАБОТА С ЦЕЛЯМИ</Typography>
                <Typography variant = 'h1' sx = {{ fontWeight: 400 }} >ИНСТРУМЕНТЫ</Typography>
                
            </Box>
            <Grid container columns = {{ xs: 1, md: 2, lg: 3}} spacing = {{ xs: 4, md: 8 }} sx = {{ m: 4}} >
                <Box>
                    <img src = {StarImage} alt = ''></img>
                    <Box>
                        <Typography></Typography>
                        <Typography></Typography>
                    </Box>
                </Box>
            </Grid>
        </Container>
    </Container> );  
}

export default Main;
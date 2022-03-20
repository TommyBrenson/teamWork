import { Container, Box, Typography, Button, Stack } from '@mui/material';
import { styled } from '@mui/material/styles'
import IphoneImage from '../../img/iphone.png';
import GBackground from '../../img/greeting_bg.jpg';
import TBackground from '../../img/tools_bg.png';
import StarImage from '../../img/star_figure.png';
import BuddyIcon from '../../img/icons/buddy_icon.png';
import CombsIcon from '../../img/icons/combs_icon.png';
import LadderIcon from '../../img/icons/ladder_icon.png';
import TimerIcon from '../../img/icons/timer_icon.png';
import DollarIcon from '../../img/icons/dollar_icon.png';
import GenerIcon from '../../img/icons/generalization_icon.png';
import ResultsImage from '../../img/results_bg.png';
import PBackground from '../../img/pink_bg.jpg';
import DBackground from '../../img/diary_bg.png';
import TodoImage from '../../img/todo_example.png';
import ABackground from '../../img/about_bg.png';

const Item = (props) => {
    return (
        <Box sx  = {{ flex: '1', display: 'flex', flexDirection: 'column', minWidth: '30vh', maxWidth: '20%', minHeight: '50vh'}}>
                    <Box sx = {{ flexGrow: '2', display: 'flex', alignItems: 'center', justifyContent: 'center', backgroundImage: `url(${StarImage})`, backgroundSize: '100% 100%', width: '100%', height: '240%', minWidth: '30vh', maxHeight: '20vh'}}>
                        <img src = {props.icon} alt = '' style = {{ maxWidth: '10vw', width: '20%', height: 'auto', }} ></img>
                    </Box>
                    <Box sx = {{ display: 'block', textAlign: 'center', color: '#100C08' }} >
                        <Typography variant = 'h5'>{props.label}</Typography>
                        <Typography>{props.description}</Typography>
                    </Box>
        </Box>
    );
}
const RoundBox = (props) => {
    return (
    <Box sx = {{ 
        display: 'flex', 
        alignItems: 'center', 
        justifyContent: 'center', 
        width: '12vw', height: '12vw', 
        border: '5px solid #88009E', 
        borderRadius: '100%' }}
    >
        <Typography variant = 'h4' sx = {{ fontWeight: 400 }} >{props.numValue} <br></br> {props.textValue}</Typography>
    </Box>
    );
}
const Main = () => {
    return (
    <Container id = 'greeting' disableGutters sx = {{  display: 'flex', justifyContent: 'space-around', alignItems: 'center', marginRight: 0, marginLeft: 0, flexDirection: 'column' }}>
        <Container sx = {{ width: '100%', backgroundImage: `url(${GBackground})`, backgroundSize: '100% 100%', display: { xs: 'block', md: 'flex', lg: 'flex' }, justifyContent: 'space-around', alignItems: 'center', flexDirection: 'row', flexWrap: 'wrap' }}>
                <Box sx = {{ display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'space-between' }}>
                    <Box  sx = {{ padding: '5vh', maxWidth: '110vh', m: 1, textAlign: 'center' }} >
                        <Typography variant = 'h2' sx = {{ mb: 5 }} >Начните достигать своих целей сегодня</Typography>
                        <Typography variant = 'h4' sx = {{ lineHeight: 1.6 }} >DINAMICPROGRESS — это онлайн-программа для постановки целей, которая помогает вам создавать цели и управлять ими, чтобы быстрее добиться успеха. Он имеет интуитивно понятный процесс, который делает процесс постановки целей простым и легким. Это так весело, что вы удивитесь, почему не начали раньше.</Typography>
                    </Box>
                    <Button sx = {{ background: 'rgba(0, 0, 0, 0.3)', fontSize: '1.3em', m: 3.5, width: '30vw', height: '9vh', color: 'beige', border: '3px solid beige', letterSpacing: '0.3em'}}>Присоединиться</Button>
                </Box>
                <Box><img src = {IphoneImage} alt = '' style = {{ maxWidth: '41vh', height: 'auto'}}/></Box>
        </Container>
        <Container id = 'tools' sx = {{ display: {xs: 'block', md: 'flex', lg: 'flex'}, flexDirection: 'column', justifyContent: 'center', alignItems: 'center', backgroundImage: `url(${TBackground})`, backgroundSize: 'cover'}} >
            <Box color = '#100C08' sx = {{ textAlign: 'center', mt: 2}} >
                <Typography variant = 'h4' sx = {{ fontWeight: 400 }} >РАБОТА С ЦЕЛЯМИ</Typography>
                <Typography variant = 'h1' sx = {{ fontWeight: 400 }} >ИНСТРУМЕНТЫ</Typography>
                
            </Box>
            <Box sx = {{ userContent: 'none', width: '60vw', display: 'flex', flexFlow: 'row wrap', justifyContent: 'space-around', alignItems: 'center', columnCount: { xs: 2, md: 2, lg: 3 }}}>
                <Item 
                    icon = {BuddyIcon}
                    label = 'Похожие цели'
                    description = 'Не оставайтесь в одиночестве со своей целью. Находите себе единомышленников и делитесь результатами'
                />
                <Item 
                    icon = {LadderIcon}
                    label = 'Вовлечение'
                    description = 'Игровая механика DynamicProgress позволяет вовлечь вас в процесс с большей самоотдачей'
                />
                <Item 
                    icon = {TimerIcon}
                    label = 'Напоминания'
                    description = 'Мы будем напоминать вам о незавершенных целях и подбадривать в трудную минуту'
                />
                <Item 
                    icon = {CombsIcon}
                    label = 'Делаем сложное простым'
                    description = 'При создании цели вам будут задаваться разные важные вопросы. Так просто и непринужденно вы осознаете свои первые действия'
                />
                <Item 
                    icon = {GenerIcon}
                    label = 'Шаблоны целей'
                    description = 'Пошаговые инструкции от опытных специалистов. Консультации включены. Шаблон устанавливается в профиль как обычная цель'
                />
                <Item 
                    icon = {DollarIcon}
                    label = 'Цена слова'
                    description = 'В детстве мы многое делали на спор. Выиграть было делом принципа. Почему бы не воспользоваться этим методом сейчас?'
                />
            </Box>
        </Container>
        <Container disableGutters>
            <Box sx = {{ display: 'flex', flexDirection: 'row', minHeight: '30vh' , width: 'auto',  backgroundImage: `url(${PBackground})`, backgroundSize: '100% 100%'}}>
                <Box sx = {{ backgroundImage: `url(${ResultsImage})`, backgroundSize: '100% 100%', width: '50%'}}></Box>
                <Box sx = {{ color: '#100C08', textAlign: 'left', width: '50%', mt: 2, mx: 4 }} >
                    <Typography variant = 'h2' sx = {{ textAlign: 'center', fontWeight: 500 }} >Результаты и аналитика</Typography>
                    <Typography variant = 'h3' sx = {{ fontWeight: 300 }} lineHeight = '2' >
                        <p>Все результаты сохраняются в личном кабинете.<br></br>Детальная аналитика доступна по каждой пройденной работе и выполненному заданию.</p>
                    </Typography>
                </Box>
            </Box>
        </Container>
        <Container disableGutters sx = {{ backgroundImage: `url(${DBackground})`, backgroundSize: '100% 100%', p: 4}} >
            <Box sx = {{ display: 'flex', flexFlow: 'row wrap', justifyContent: 'space-between', alignItems: 'center', height: '80vh', maxHeight: 'auto', width: 'auto' }} >
                <Box sx = {{flexGrow: '2', maxWidth: '40vw', m: 6}}>
                    <Typography variant = 'h2' >Личный дневник ваших достижений</Typography>
                    <Typography variant = 'h4' lineHeight = "2" >DINAMICPROGRESS записывает все ваши маленькие и большие выигрыши. Подписавшись, вы также можете вести собственные записи в журнале и отслеживать собственные показатели.</Typography>
                </Box>
                <Box sx = {{flexGrow: '3', display: 'flex', justifyContent: 'center' }} ><img src = {TodoImage} alt = '' style = {{ minWidth: '40vw', width: '45vw', height: 'auto'}} ></img></Box>
            </Box>
        </Container>
        <Container disableGutters sx = {{ alignItems: 'center', justifyContent: 'center', backgroundImage: `url(${ABackground})`, backgroundSize: '100% 100%' }} >
            <Box sx = {{ display: 'flex', flexDirection: 'column', justifyContent: 'space-around', alignItems: 'center', height: '90vh', p: 4, color: '#100C08', textAlign: 'center' }} >
                <Stack
                    sx = {{ ml: 'auto', mr: 4}}
                    direction = 'row'
                    spacing = {2}
                >
                   <RoundBox numValue = '1 000 000' textValue = 'человек'/>
                   <RoundBox numValue = '1 000 000' textValue = 'человек'/>
                </Stack>
                <Box>
                    <Typography variant = 'h1' sx = {{ fontWeight: 350, color: '#00FFF0' }} >ДОСТИГАЙТЕ ЦЕЛЕЙ <br></br> ВМЕСТЕ С НАМИ</Typography>
                    <Typography variant = 'h5'>Будет интересно и полезно! <br></br> Переводите мечты в цели и достигайте их в среде единомышленников</Typography>
                </Box>
                <Button sx = {{ background: 'rgba(0, 0, 0, 0.2)', fontSize: '1.3em', width: '30vw', color: '#100C08', height: '9vh', border: '3px solid #88009E', letterSpacing: '0.3em', fontWeight: 500 }}>Присоединиться</Button>
            </Box>
        </Container>
    </Container> );  
}

export default Main;
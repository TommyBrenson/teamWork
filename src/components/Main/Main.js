import { Container, Box, Typography, Button, Stack, Link } from '@mui/material';
import { styled } from '@mui/material/styles';
import FadeInSection from '../FadeInSection/FadeInSection';
import AnimatedCounter from '../AnimatedCounter/AnimatedCounter';
import CountUp from 'react-countup';
import IphoneImage from '../../assets/img/iphone.png';
import StarImage from '../../assets/img/star_figure.png';
import VKIcon from '../../assets/img/icons/vk_icon.png';
import TGIcon from '../../assets/img/icons/tg_icon.png';
import InstIcon from '../../assets/img/icons/inst_icon.png';
import ResultsImage from '../../assets/img/results_bg.png';
import TodoImage from '../../assets/img/todo_example.png';

const Item = (props) => {
    return (
        <Box sx  = {{ display: 'flex', flexDirection: 'column', justifyContent: 'center', alignItems: 'center', width: '20vw', maxHeight: '20vw' }}>
                    <Box sx = {{ flexGrow: '2', display: 'flex', width: '9vw', height: '9vw', alignItems: 'center', justifyContent: 'center', backgroundImage: `url(${StarImage})`, backgroundSize: '100% 100%', }}>
                        <div style = {{ width: '9vw', height: '9vw', border: 'none' }} ></div>
                    </Box>
                    <Box sx = {{ display: 'block', textAlign: 'center', width: '15vw', height: 'auto', minHeight: '25vh'}} >
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
        <Typography variant = 'h4' sx = {{ fontWeight: 400 }} >
            <CountUp 
                start = {Math.floor(props.numValue * (Math.random()*0.5 + 0.45))} 
                end = {props.numValue} 
                redraw = {true} 
                enableScrollSpy
                duration = {4}
                onEnd = {({pauseResume, reset, start, update }) => reset()}
            >
            </CountUp> 
            <br></br> {props.textValue}</Typography>
    </Box>
    );
}
const Main = () => {
    return (
    <Container id = 'goals' disableGutters sx = {{  display: 'flex', justifyContent: 'space-around', alignItems: 'center', marginRight: 0, marginLeft: 0, flexDirection: 'column' }}>
            <Container sx = {{ width: '100%', backgroundImage: `linear-gradient(168.44deg, #3F4CC4 22.7%, #A8BB37 68.82%)`, backgroundSize: '100% 100%', display: { xs: 'block', md: 'flex', lg: 'flex' }, justifyContent: 'space-around', alignItems: 'center', flexDirection: 'row', flexWrap: 'wrap' }}>
                <FadeInSection>
                    <Container disableGutters sx = {{ display: 'flex', flexDirection: 'row', alignItems: 'center', justifyContent: 'space-around' }}>
                        <Box sx = {{ display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'space-between' }}>
                            <Box  sx = {{ padding: '5vh', maxWidth: '110vh', m: 1, textAlign: 'center' }} >
                                <Typography variant = 'h2' sx = {{ mb: 5 }} >Начните достигать своих целей сегодня</Typography>
                                <Typography variant = 'h4' sx = {{ lineHeight: 1.6 }} >DINAMICPROGRESS — это онлайн-программа для постановки целей, которая помогает вам создавать цели и управлять ими, чтобы быстрее добиться успеха. Он имеет интуитивно понятный процесс, который делает процесс постановки целей простым и легким. Это так весело, что вы удивитесь, почему не начали раньше.</Typography>
                            </Box>
                        <Link underline = 'none' href = "/registration">
                            <Button sx = {{ background: 'rgba(0, 0, 0, 0.3)', fontSize: '1.3em', m: 3.5, width: '30vw', height: '9vh', color: 'beige', border: '3px solid beige', letterSpacing: '0.3em'}}>Присоединиться</Button>
                        </Link>
                        </Box>
                        <Box>
                            <img src = {IphoneImage} alt = '' style = {{ maxWidth: '41vh', height: 'auto'}}/>
                        </Box>
                    </Container>
                    </FadeInSection>
            </Container>
        
        <Container id = 'tools' sx = {{ display: {xs: 'block', md: 'flex', lg: 'flex'}, height: 'auto', p: 1, flexDirection: 'column', justifyContent: 'center', alignItems: 'center', backgroundImage: `linear-gradient(194.18deg, #A9BB37 32.88%, rgba(15, 207, 57, 0.63) 72.17%)` }} >
        <FadeInSection>
        <Container sx = {{ display: {xs: 'block', md: 'flex', lg: 'flex'}, height: 'auto', p: 1, flexDirection: 'column', justifyContent: 'center', alignItems: 'center' }} >
            <Box sx = {{ textAlign: 'center', mt: 4}} >
                <Typography variant = 'h4' sx = {{ fontWeight: 400, m: 2 }} >РАБОТА С ЦЕЛЯМИ</Typography>
                <Typography variant = 'h1' sx = {{ fontWeight: 400 }} >ИНСТРУМЕНТЫ</Typography>
                
            </Box>
            <Box sx = {{ userContent: 'none', width: '70%', display: 'flex', flexFlow: 'row wrap', justifyContent: 'space-between', alignItems: 'center', columnWidth: '10vw', rowGap: '10vh', p: 4, columnCount: { xs: 2, md: 2, lg: 3 }}}>
                <Item 
                    label = 'Похожие цели'
                    description = 'Не оставайтесь в одиночестве со своей целью. Находите себе единомышленников и делитесь результатами'
                />
                <Item 
                    label = 'Вовлечение'
                    description = 'Игровая механика DynamicProgress позволяет вовлечь вас в процесс с большей самоотдачей'
                />
                <Item 
                    label = 'Напоминания'
                    description = 'Мы будем напоминать вам о незавершенных целях и подбадривать в трудную минуту'
                />
                <Item 
                    label = 'Делаем сложное простым'
                    description = 'При создании цели вам будут задаваться разные важные вопросы. Так просто и непринужденно вы осознаете свои первые действия'
                />
                <Item 
                    label = 'Шаблоны целей'
                    description = 'Пошаговые инструкции от опытных специалистов. Консультации включены. Шаблон устанавливается в профиль как обычная цель'
                />
                <Item 
                    label = 'Цена слова'
                    description = 'В детстве мы многое делали на спор. Выиграть было делом принципа. Почему бы не воспользоваться этим методом сейчас?'
                />
            </Box>
            </Container>
            </FadeInSection>
        </Container>

        <Container disableGutters sx = {{ background: `linear-gradient(178.26deg, rgba(15, 207, 57, 0.63) 25.4%, #00BFB4 82.35%)` }}>
        <FadeInSection>
        <Container disableGutters sx = {{ display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'center', height: '100vh', maxHeight: '100%' }}>
                <Box sx = {{ display: 'flex', flexDirection: 'row', height: '100vh', width: 'auto' }}>
                    <Box sx = {{ flexGrow: '2', backgroundImage: `url(${ResultsImage})`, backgroundSize: '90vh 90%', backgroundPosition: 'center center', backgroundRepeat: 'no-repeat' }}></Box>
                    <Box sx = {{ display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'space-around', textAlign: 'left', width: '50%', mt: 2, mx: 4 }} >
                        <Typography variant = 'h2' sx = {{ textAlign: 'center', fontWeight: 500 }} >Результаты и аналитика</Typography>
                        <Typography variant = 'h3' sx = {{ fontWeight: 300 }} lineHeight = '2' >
                            <p>Все результаты сохраняются в личном кабинете.<br></br>Детальная аналитика доступна по каждой пройденной работе и выполненному заданию.</p>
                        </Typography>
                    </Box>
                </Box>
        </Container>
        </FadeInSection>
        </Container>
        
        <Container id = 'about' disableGutters sx = {{ display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'center', background: `linear-gradient(180deg, #00BFB3 0%, #00BFB3 100%)`, height: '100vh', maxHeight: '100%' }}>
                <FadeInSection style = {{ flexDirection: 'column' }}>
                <Container disableGutters sx = {{ display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'center', height: '100vh', maxHeight: '100%' }}>
                <Typography variant = 'h2' textAlign = 'center' >Информация о компании <br></br> DYNAMICPROGRESS</Typography>
                <Box sx = {{ display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'space-between', p: 4 }} >
                    <Typography variant = 'h4' lineHeight = '2' sx =  {{ px: '10vw', mr: 'auto' }}>Наши соц.сети</Typography>
                    <Box sx = {{ display: 'flex', flexDirection: 'row', alignItems: 'center', justifyContent: 'flex-end', height: 'auto', width: '70vw', p: 1, px: 2,  m: 2, background: `linear-gradient(180deg, rgba(255, 78, 195, 0.87) 0%, rgba(255, 255, 255, 0.3) 100%)`,  }} >
                        <Stack
                        direction = 'row'
                        spacing = {2}
                        >
                            <Link href = ''>
                                <img src = {VKIcon} alt = '' style = {{ width: '4vw', height: '4vw'}} ></img>
                            </Link>
                            <Link href = ''>
                                <img src = {InstIcon} alt = '' style = {{ width: '4vw', height: '4vw'}} ></img>
                            </Link>
                            <Link href = ''>
                                <img src = {TGIcon} alt = '' style = {{ width: '4vw', height: '4vw'}} ></img>
                            </Link>
                        </Stack>
                    </Box>
                    <Typography variant = 'h5' lineHeight = '2' textAlign = 'center' sx =  {{ px: '10vw', maxWidth: '60vw' }}>DINAMICPROGRESS — это онлайн-программа для постановки целей, которая помогает вам создавать цели и управлять ими, чтобы быстрее добиться успеха. Он имеет интуитивно понятный процесс, который делает процесс постановки целей простым и легким. Это так весело, что вы удивитесь, почему не начали раньше.</Typography>
                    <Typography variant = 'h4' lineHeight = '1.5' sx =  {{ px: '10vw', mr: 'auto', mt: 4 }}>Находимся в работе с 2022 года <br></br> Приложение создано 3 высоквалифицированными специалистами</Typography>
                </Box>
                </Container>
                </FadeInSection>
        </Container>
        <Container disableGutters sx = {{ background: `linear-gradient(181.7deg, #00BFB3 20.39%, #09083F 78.99%)`, backgroundSize: '100% 100%', p: 4}} >
            <FadeInSection>
                <Container disableGutters sx = {{ display: 'flex', flexDirection: 'row', alignItems: 'center', justifyContent: 'center' }} >
                    <Box sx = {{ display: 'flex', flexFlow: 'row wrap', justifyContent: 'space-between', alignItems: 'center', height: '100vh', maxHeight: '100vh', width: '100vw' }} >
                        <Box sx = {{display: 'flex', flexDirection: 'column', alignItems: 'center', justifyContent: 'space-between', maxWidth: '50vw', m: 6 }}>
                            <Typography variant = 'h2' sx = {{ pb: 8 }} >Личный дневник ваших достижений</Typography>
                            <Typography variant = 'h4' lineHeight = "2" >DINAMICPROGRESS записывает все ваши маленькие и большие выигрыши. Подписавшись, вы также можете вести собственные записи в журнале и отслеживать собственные показатели.</Typography>
                        </Box>
                        <Box sx = {{flexGrow: '2', display: 'flex', justifyContent: 'center', height: '80%', width: '20%', backgroundImage: `url(${TodoImage})`, backgroundSize: '80% 80%', backgroundRepeat: 'no-repeat', backgroundPosition: 'center center'}} ></Box>
                    </Box>
                </Container>
            </FadeInSection>
        </Container>
        <Container disableGutters sx = {{ alignItems: 'center', justifyContent: 'center', background: `linear-gradient(172.79deg, #09083E 25.48%, #5D1269 81.34%)`, backgroundSize: '100% 100%' }} >
            <FadeInSection>
            <Container disableGutters sx = {{ display: 'flex', alignItems: 'center', justifyContent: 'center' }} >
            <Box sx = {{ display: 'flex', flexDirection: 'column', justifyContent: 'space-around', alignItems: 'center', height: '90vh', p: 4, textAlign: 'center' }} >
                
                <Box>
                    <Typography variant = 'h1' sx = {{ fontWeight: 350, color: '#00FFF0' }} >ДОСТИГАЙТЕ ЦЕЛЕЙ <br></br> ВМЕСТЕ С НАМИ</Typography>
                    <Typography variant = 'h5'>Будет интересно и полезно! <br></br> Переводите мечты в цели и достигайте их в среде единомышленников</Typography>
                </Box>
                <Stack
                    sx = {{ mx: 4}}
                    direction = 'row'
                    spacing = {2}
                >

                   <RoundBox numValue = {1000000} textValue = 'человек'/>
                   <RoundBox numValue = {1000000} textValue = 'человек'/>
                   <RoundBox numValue = {1000000} textValue = 'человек'/>
                   <RoundBox numValue = {1000000} textValue = 'человек'/>
                </Stack>
                <Link underline = 'none' href = "/registration">
                    <Button sx = {{ background: 'rgba(0, 0, 0, 0.2)', fontSize: '1.3em', width: '30vw', color: 'beige', height: '9vh', border: '3px solid #88009E', letterSpacing: '0.3em', fontWeight: 500 }}>Присоединиться</Button>
                </Link>
            </Box>
            </Container>
            </FadeInSection>
        </Container>
    </Container> );  
}

export default Main;
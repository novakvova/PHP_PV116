import './App.css'
import HomePage from "./components/home/HomePage.tsx";
import {Route, Routes} from "react-router-dom";
import NoMatchPage from "./components/404/NoMatchPage.tsx";
import CategoryCreatePage from "./components/categories/create/CategoryCreatePage.tsx";
import RegisterPage from "./components/auth/register/RegisterPage.tsx";
import LoginPage from "./components/auth/login/LoginPage.tsx";
import DefaultHeader from "./components/containers/default/DefalutHeader.tsx";

const App = () => {
    return (
        <>
            <DefaultHeader />
            <Routes>
                <Route path="/">
                    <Route index element={<HomePage/>}/>
                    <Route path={"categories/create"} element={<CategoryCreatePage/>}/>
                    <Route path={"register"} element={<RegisterPage/>}/>
                    <Route path={"login"} element={<LoginPage/>}/>
                    <Route path="*" element={<NoMatchPage/>}/>
                </Route>
            </Routes>
        </>
    )
}

export default App

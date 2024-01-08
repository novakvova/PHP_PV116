import './App.css'
import HomePage from "./components/home/HomePage.tsx";
import {Route, Routes} from "react-router-dom";
import NoMatchPage from "./components/404/NoMatchPage.tsx";
import CategoryCreatePage from "./components/categories/create/CategoryCreatePage.tsx";
import RegisterPage from "./components/auth/register/RegisterPage.tsx";

const App = () => {
    return (
        <>
            <Routes>
                <Route path="/">
                    <Route index element={<HomePage/>}/>
                    <Route path={"categories/create"} element={<CategoryCreatePage/>}/>
                    <Route path={"register"} element={<RegisterPage/>}/>
                    <Route path="*" element={<NoMatchPage/>}/>
                </Route>
            </Routes>
        </>
    )
}

export default App

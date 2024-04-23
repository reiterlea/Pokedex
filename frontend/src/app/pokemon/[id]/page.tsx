'use client'
import {useState, useEffect} from "react"
import Image from "next/image";

type Pokemon = {
    name: string;
    image: string;
    sprites: {
        front_default: string;
        back_default: string;
    }
};

const fetchPokemon = async (id: number) => {
    const res = await fetch(`http://localhost/pokemon/${id}`)
    return await res.json()
}

export default function Page({params}: { params: { id: number } }) {
    const id = params.id;
    const [pokemon, setPokemon] = useState<Pokemon | null>(null);

    useEffect(() => {
        const fetchData = async () => {
            const data = await fetchPokemon(id);
            setPokemon(data);
        };
        fetchData();
    }, [id]);

    if (!pokemon) {
        return <div>Loading...</div>;
    } else {
        return (
            <div>
                <h1>{pokemon.name}</h1>
                <Image src={pokemon.sprites['front_default']} alt={pokemon.name} width={120} height={120}/>
            </div>
        )
    }
}